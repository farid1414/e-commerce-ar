<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Product;
use Illuminate\Support\Carbon;
use App\Models\Master\FlashSale;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\ProductFlashSale;

class FlashSaleController extends Controller
{
    const ROUTE = 'master.flash-sale.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index()
    {
        $currentDateTime = Carbon::now();

        $flashSale = FlashSale::get();
        // Menampilkan data flash sale yang akan datang (upcoming)
        $upcomingFlashSales = FlashSale::where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '>', $currentDateTime);
        })->with('productFlashSale')->get();

        // Menampilkan data flash sale yang sedang berjalan (active)
        $activeFlashSales = FlashSale::where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->get();

        // Menampilkan data flash sale yang sudah hangus (expired)
        $expiredFlashSales = FlashSale::where(function ($query) use ($currentDateTime) {
            $query->where('end_time', '<', $currentDateTime);
        })->with('productFlashSale')->get();

        return view('admin.programflashsale', [
            'flashSale' => $flashSale,
            'upcoming' => $upcomingFlashSales,
            'active' => $activeFlashSales,
            'expired' => $expiredFlashSales
        ]);
    }

    public function form()
    {
        $product = Product::where('is_active', true)->where('stock', '!=', 0)->get();
        return view(
            'admin.tambahflashsale',
            [
                'products' => $product
            ]
        );
    }

    public function getProduct(Request $request)
    {
        $id = $request->id;
        if (!$id) return ERROR_RESPONSE("Product required");

        $product = Product::whereIn('id', $id)->with('varians')->get();
        $product = $product->map(function ($ca) {
            $ca->image_url = url($ca->thumbnail);
            $ca->price =  number_format($ca->harga, 0, ',', '.');
            return $ca;
        });

        return JSON_RESPONSE("Succes get product", $product);
    }
    public function  store(Request $request)
    {

        $id = $request->id;
        $prod_flash = [];
        foreach ($id as $i => $id) {
            if (isset($request->stok_varian[$id])) {
                foreach ($request->stok_varian[$id] as $key => $stok) {
                    $data = [
                        'product_id' => $id,
                        'product_varian_id' => $request->id_varian[$id][$key],
                        'custom_stock' => $stok
                    ];
                    array_push($prod_flash, $data);
                }
            } else {
                $data  = [
                    'product_id' => $id
                ];
                array_push($prod_flash, $data);
            }
        }
        try {
            DB::beginTransaction();
            $flash = FlashSale::create([
                'name' => $request->title,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time
            ]);

            foreach ($prod_flash as $prod) {
                $prod['flash_sale_id'] = $flash->id;
                ProductFlashSale::create($prod);
            }
            DB::commit();
            return JSON_RESPONSE("Success.\nSave flash sale ", null, [
                'url' => route(self::ROUTE . 'index'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
