<?php

namespace App\Http\Controllers\Api\Master;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\ProductImage;
use App\Models\Master\ProductVarian;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($request->uuid)) return $this->update($request, $request->uuid);

        $data = [
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'm_categories' => $request->m_categories,
            'categori_id' => $request->categori_id,
            'sub_name' => $request->sub_name,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'description' => $request->description,
            'harga_ongkir' => $request->harga_ongkir ?? null,
            'thumbnail' => $request->thumbnail,
            'link_ar'  => $request->link_ar,
            'link_ar_ios' => $request->link_ar_ios,
            'link_skybox' => $request->link_skybox,
            'status_varian' => $request->status_varian ?? false,
            'status_diskon' => $request->status_diskon ?? false,
            'status_dimensi' => $request->status_dimensi ?? false,
            'diskon' => $request->diskon,
            'stok_sekarang' => $request->stok_sekarang
        ];

        $validate = Validator::make($data, Product::RULES, Product::MESSAGE, Product::CUSTOM_NAME);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        if (isset($request->thumbnail)) {
            $file = $request->thumbnail;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folder = 'storage/product/thumbnail/';
            $file->move(public_path($folder), $filename);
            $url = $folder . $filename;
            $data['thumbnail'] = $url;
        }
        try {
            DB::beginTransaction();
            $product = Product::create($data);

            if ($request->varian) {
                foreach ($request->varian as $varian) {
                    ProductVarian::create([
                        'product_id' => $product->id,
                        'name' => $varian
                    ]);
                }
            }

            if (isset($request->image)) {
                foreach ($request->image as $img) {
                    $filename = time() . '.' . $img->getClientOriginalExtension();
                    $folder = 'storage/product/thumbnail/';
                    $img->move(public_path($folder), $filename);
                    $url = $folder . $filename;
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $url
                    ]);
                }
            }
            DB::commit();
            return JSON_RESPONSE("Success.\nSave new product {$product->name}", $product);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, string $uuid)
    {
        $product = Product::where('uuid', $uuid)->first();
        if (!$product) return ERROR_RESPONSE("Product not found");

        $data = [
            'name' => $request->name,
            'm_categories' => $request->m_categories,
            'categori_id' => $request->categori_id,
            'sub_name' => $request->sub_name,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'bayangan' => $request->bayangan,
            'description' => $request->description,
            'harga_ongkir' => $request->harga_ongkir ?? null,
            'thumbnail' => $request->thumbnail,
            'link_ar'  => $request->link_ar,
            'link_ar_ios' => $request->link_ar_ios,
            'link_skybox' => $request->link_skybox,
            'status_varian' => $request->status_varian ?? false,
            'status_diskon' => $request->status_diskon ?? false,
            'status_dimensi' => $request->status_dimensi ?? false,
            'diskon' => $request->diskon,
            'stok_sekarang' => $request->stok_sekarang
        ];

        $rules = Product::RULES;
        $rules['thumbnail'] = 'nullable';
        $validate = Validator::make($data, $rules, Product::MESSAGE, Product::CUSTOM_NAME);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        // Code update
    }
}
