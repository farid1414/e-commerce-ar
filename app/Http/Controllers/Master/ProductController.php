<?php

namespace App\Http\Controllers\Master;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Product;
use App\Models\Master\Category;
use App\Models\Master\MCategory;
use Illuminate\Support\Facades\DB;
use App\Models\Master\ProductImage;
use App\Http\Controllers\Controller;
use App\Models\Master\ProductVarian;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    const ROUTE = 'master.product.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index(string $slug)
    {
        $mcat = MCategory::firstWhere('slug', $slug);
        $product = Product::where('m_categories', $mcat->id)->get();

        return view('Admin.index-product', [
            'mCat' => $mcat,
            'products' => $product
        ]);
    }

    public function data(Request $request)
    {
        $query = Product::select('*')
            ->where('m_categories', $request->categori)
            ->where('is_active', $request->is_active)
            ->with('varians', 'category');

        if ($request->akan_habis) {
            $query = $query->where('stock', '>=', 1)->where('stock', '<', 5);
        } else if (!$request->habis) {
            $query = $query->where('stock', '>', 5);
        }

        if ($request->habis) {
            $query = $query->orWhere(function ($q) {
                $q->where('is_active', false)
                    ->orWhere('stock', 0);
            });
            $query = $query->where('m_categories', $request->categori);
        } else if (!$request->akan_habis) {
            $query = $query->where('is_active', true)->Where('stock', '>', 5);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('gambar', function ($q) {
                return '<img src="' . url($q->thumbnail) . ' " width="50" alt="" class="img-fluid" />';
            })
            ->addColumn('actions', function ($q) {
                $textArchive = 'Arsipkan';
                $dataArchive = 'false';
                if (!$q->is_active) {
                    $textArchive = "Aktifkan";
                    $dataArchive = "true";
                }

                return '    <button class="btn btn-link update-stock" data-produk="' . $q->name . '" data-stock="' . $q->stock . '" data-uuid="' . $q->uuid . '" style="text-decoration:none;">Update Stok</button>
                                <br />
                            <a href="' . route(self::ROUTE . 'form', ['slug' => $q->masterCat->slug, 'uuid' => $q->uuid]) . '" style="text-decoration:none;" >Ubah </a>
                                <br />
                            <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"> Lainnya </button>
                                    <ul class="dropdown-menu">
                                            <li><a class="dropdown-item btn-delete" data-uuid="' . $q->uuid . '" href="javascript:void(0);">Hapus Produk</a></li>
                                            <li><a class="dropdown-item arsip-product" href="javascript:void(0);"  data-active="' . $dataArchive . '" data-uuid="' . $q->uuid . '" style="text-decoration: none;">' . $textArchive . ' Produk</a> </li>
                                            <li><a class="dropdown-item" href="' . route(self::ROUTE . 'detail', $q->uuid) . '">Lihat Detail Produk</a></li>
                                    </ul>
                            </div>';
            })
            ->addColumn('varians', function ($q) {
                $html = '<ul class="list-group list-group-flush text-start ">';
                foreach ($q->varians as $varian) {
                    $html .= ' <li class="list-group-item"> - ' . $varian->name . '</li>';
                }
                $html .= '</ul>';
                return $html;
            })
            ->addColumn('varians_search', function ($q) {
                return $q->varians->pluck('name')->implode(', ');
            })
            ->editColumn('harga', function ($q) {
                return 'Rp. ' . number_format($q->harga, 0, ',', '.');
            })
            ->addColumn('category', function ($q) {
                return $q->category->name;
            })
            ->editColumn('terjual', function ($q) {
                return 0;
            })
            // ->escapeColumns([])->rawColumns(['gambar', 'varians'])
            ->escapeColumns([])
            ->make(true);
    }

    public function detail(string $uuid)
    {
        $product = Product::firstWhere('uuid', $uuid);

        return view('admin.detailproduk', [
            'product' => $product
        ]);
    }

    public function form(string $slug, string $uuid = null)
    {

        $mcat = MCategory::firstWhere('slug', $slug);
        $cat = Category::where('m_categories', $mcat->id)->where('is_active', '=', 1)->get();
        $edit = false;
        if ($uuid) {
            $edit = true;
            $product = Product::firstWhere('uuid', $uuid);
            if (!$product) return redirect()->back()->with('error', 'Product Not Found');
        }
        return view('Admin.tambah-product', [
            'mCat' => $mcat,
            'categories' => $cat,
            'product' => $product ?? null,
            'edit' => $edit
        ]);
    }

    public function store(Request $request)
    {
        if (!empty($request->uuid)) return $this->update($request, $request->uuid);

        $data = [
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'm_categories' => $request->m_categories,
            'categori_id' => $request->kategori,
            'sub_name' => $request->sub_name,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'description' => $request->description ?? null,
            'harga_ongkir' => $request->ongkir ?? null,
            'thumbnail' => $request->thumbnail,
            'link_ar'  => $request->link_ar_android,
            'link_ar_ios' => $request->link_ar_ios,
            'link_skybox' => $request->link_skybox,
            'status_varian' => $request->check_varian == 'on' ? true : false,
            'status_diskon' => $request->check_diskon == 'on' ? true : false,
            'status_dimensi' => $request->check_dimensi == 'on' ? true : false,
            'diskon' => $request->diskon_product ?? null,
            'stok_sekarang' => $request->stock
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
        if ($request->panjang_produk) $data['panjang'] = $request->panjang_produk;
        if ($request->lebar_produk) $data['lebar'] = $request->lebar_produk;
        if ($request->tinggi_produk) $data['tinggi'] = $request->tinggi_produk;

        $dataVarian = [];
        if (isset($request->name_varian) && $request->check_varian == "on") {
            foreach ($request->name_varian as $index => $varian) {
                $dataVarian[] = [
                    'name' => $varian,
                    'warna' => $request->warna_varian[$index] ?? null,
                    'stock' => $request->stok_varian[$index] ?? null,
                    'harga' => $request->harga_varian[$index] ?? null,
                ];
            }
        }
        if (isset($request->diskon_varian) && $request->check_diskon_varian == "on") {
            foreach ($request->diskon_varian as $index =>   $diskon) {
                if (isset($dataVarian[$index])) {
                    $dataVarian[$index]['diskon'] = $diskon;
                }
            }
        }

        if (isset($request->panjang_varian) && $request->check_dimenso_varian == "on") {
            foreach ($request->panjang_varian as $index => $p) {
                if (isset($dataVarian[$index])) {
                    $dataVarian[$index]['panjang'] = $p;
                    $dataVarian[$index]['lebar'] = $request->lebar_varian[$index] ?? null;
                    $dataVarian[$index]['tinggi'] = $request->tinngi_varian[$index] ?? null;
                }
            }
        }

        $route = 'dataran';
        if ($data['m_categories'] == 2) {
            $route = 'dinding';
        }

        try {
            DB::beginTransaction();
            $product = Product::create($data);

            if (isset($request->image)) {
                $images = $request->image;
                foreach ($images as  $img) {
                    $filename = uniqid() . '_' . time() . '.' . $img->getClientOriginalExtension();
                    $folder = 'storage/product/images/';
                    $img->move(public_path($folder), $filename);
                    $url = $folder . $filename;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $url
                    ]);
                }
            }
            if (count($dataVarian)) {
                foreach ($dataVarian as  $varian) {
                    $varian['product_id'] = $product->id;
                    ProductVarian::create($varian);
                }
            }
            DB::commit();
            return JSON_RESPONSE("Success.\nSave new category product {$request->name}", null, [
                'url' => route(self::ROUTE . 'index', $route),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to create product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        $product = Product::firstWhere('uuid', $request->uuid);
        if (!$product) return ERROR_RESPONSE("Product not found");

        $data = [
            'name' => $request->name,
            'm_categories' => $request->m_categories,
            'categori_id' => $request->kategori,
            'sub_name' => $request->sub_name,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'description' => $request->description ?? null,
            'harga_ongkir' => $request->ongkir ?? null,
            'thumbnail' => $request->thumbnail,
            'link_ar'  => $request->link_ar_android,
            'link_ar_ios' => $request->link_ar_ios,
            'link_skybox' => $request->link_skybox,
            'status_varian' => $request->check_varian == 'on' ? true : false,
            'status_diskon' => $request->check_diskon == 'on' ? true : false,
            'status_dimensi' => $request->check_dimensi == 'on' ? true : false,
            'diskon' => $request->diskon_product ?? null,
            'stok_sekarang' => $request->stock
        ];
        $rules = Product::RULES;
        $rules['thumbnail'] = 'nullable';

        $validate = Validator::make($data, $rules, Product::MESSAGE, Product::CUSTOM_NAME);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        $data['thumbnail'] = $product->thumbnail;

        if (isset($request->thumbnail)) {
            $file = $request->thumbnail;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folder = 'storage/product/thumbnail/';
            $file->move(public_path($folder), $filename);
            $url = $folder . $filename;
            $data['thumbnail'] = $url;
        }

        $data['panjang'] = $request->panjang_produk ?? null;
        $data['lebar'] = $request->lebar_produk ?? null;
        $data['tinggi'] = $request->tinggi_produk ?? null;


        $dataVarian = [];
        if (isset($request->name_varian) && $request->check_varian == "on") {
            foreach ($request->name_varian as $index => $varian) {
                $dataVarian[] = [
                    'id' => $request->id_varian[$index] ?? null,
                    'name' => $varian,
                    'warna' => $request->warna_varian[$index] ?? null,
                    'stock' => $request->stok_varian[$index] ?? null,
                    'harga' => $request->harga_varian[$index] ?? null,
                ];
            }
        }

        if (isset($request->diskon_varian) && $request->check_diskon_varian == "on") {
            foreach ($request->diskon_varian as $index =>   $diskon) {
                if (isset($dataVarian[$index])) {
                    $dataVarian[$index]['diskon'] = $diskon;
                }
            }
        }

        if (isset($request->panjang_varian) && $request->check_dimenso_varian == "on") {
            foreach ($request->panjang_varian as $index => $p) {
                if (isset($dataVarian[$index])) {
                    $dataVarian[$index]['panjang'] = $p;
                    $dataVarian[$index]['lebar'] = $request->lebar_varian[$index] ?? null;
                    $dataVarian[$index]['tinggi'] = $request->tinngi_varian[$index] ?? null;
                }
            }
        }

        $route = 'dataran';
        if ($data['m_categories'] == 2) {
            $route = 'dinding';
        }
        try {
            DB::beginTransaction();

            $product->update($data);
            $varianId = $request->id_varian ?? [];
            $varianDel = $product->varians->filter(function ($varian) use ($varianId) {
                if (count($varianId)) {
                    return !in_array($varian['id'], $varianId);
                } else {
                    return $varian;
                }
            });
            if (count($varianDel)) $varianDel->each->delete();

            if (isset($request->image)) {
                $images = $request->image;
                foreach ($images as  $img) {
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

            if (count($dataVarian)) {
                foreach ($dataVarian as  $varian) {
                    $varian['product_id'] = $product->id;
                    if ($varian['id']) {
                        ProductVarian::findOrFail($varian['id'])->update($varian);
                    } else {
                        ProductVarian::create($varian);
                    }
                }
            }
            DB::commit();
            return JSON_RESPONSE("Success.\nUpdate category product {$request->name}", null, [
                'url' => route(self::ROUTE . 'index', $route),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateStock(Request $request)
    {
        $product = Product::firstWhere('uuid', $request->uuid);
        if (!$product) return ERROR_RESPONSE("Product Not Found");

        try {
            DB::beginTransaction();
            $product->update(['stock' => $request->stock]);
            DB::commit();
            return JSON_RESPONSE("Succes, \nUpdate stock product {$product->name}");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update stock product {$product->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(string $slug, Product $product)
    {
        if (!$product) return ERROR_RESPONSE("Product Not Found");


        try {
            DB::beginTransaction();
            if ($product->images->count()) ProductImage::where('product_id', $product->id)->get()->each->delete();
            if ($product->varians->count()) $product->varians->each->delete();
            $product->delete();
            DB::commit();
            return JSON_RESPONSE("Success, \nDelete product");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to delete product", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function status(string $slug, string $uuid)
    {
        $product = Product::firstWhere('uuid', $uuid);
        if (!$product) return ERROR_RESPONSE("Product not found");

        $active = true;

        if ($product->is_active) $active = false;
        try {
            DB::beginTransaction();
            $product->update(['is_active' => $active]);
            DB::commit();
            return JSON_RESPONSE("Succes set status product {$product->name}");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to delete product", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
