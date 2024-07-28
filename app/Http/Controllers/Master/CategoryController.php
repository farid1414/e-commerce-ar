<?php

namespace App\Http\Controllers\Master;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\MCategory;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    const ROUTE = 'master.category.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index()
    {
        // $mcat = MCategory::firstWhere('slug', $slug);
        $categories = Category::get();
        return view('Admin.index-category', [
            'categories' => $categories,
            // 'mCat' => $mcat
        ]);
    }

    public function form(int $id = null)
    {
        // $cat = MCategory::firstWhere('slug', $slug);
        $edit = false;
        if ($id) {
            $categories = Category::findOrFail($id);
            $edit = true;
        }
        return view('Admin.tambahkategori', [
            // 'm_cat' => $cat,
            'categories' => $categories ?? null,
            'edit' => $edit
        ]);
    }

    public function data(Request $request)
    {
        $query = Category::select('*')->where('is_active', $request->is_active);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($q) {
                $textArchive = 'Arsipkan';
                $dataArchive = 'false';
                if (!$q->is_active) {
                    $textArchive = "Aktifkan";
                    $dataArchive = "true";
                }

                return '<button class="btn btn-link btn-active-cat"  data-active="' . $dataArchive . '" data-id="' . $q->id . '" style="text-decoration: none;" >' . $textArchive . '</button> <br />
                        <a href="' . route(self::ROUTE . 'form', ['id' => $q->id]) . ' " class="btn btn-link" style="text-decoration: none;">Ubah</a>
                        <br />
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" style="text-decoration:none;"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"> Lainnya </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item btn-delete" data-id="' . $q->id . '" href="javascript:void(0);">Hapus Kategori</a></li>
                            <li><a class="dropdown-item" href="' . route(self::ROUTE . 'detail', ['id' => $q->id]) . '">Lihat Detail Kategori</a>
                             </li>
                        </ul>
            </div>';
            })
            ->editColumn('product', function ($q) {
                return '<img src="' . url($q->image) . ' " width="50" alt="" class="img-fluid" />';
            })
            ->editColumn('total_product', function ($q) {
                $html = ' <a class="text-dark fw-bold"> ' . $q->products->count() . ' <br /> <small>Produk</small> </a>';
                return $html;
            })
            ->editColumn('created_date', function ($q) {
                return '   <span class="text-dark fw-bold text-center">' . $q->user->name . ' <br /> <small>' . $q->created_date() . '</small> </span>';
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function detail(string $slug, int $id)
    {
        $cat = Category::findOrFail($id);

        return view(
            'admin.detailkategori',
            [
                'categori' => $cat
            ]
        );
    }

    public function store(Request $request)
    {
        if (!empty($request->id)) return $this->update($request);
        $data = [
            'name' => ucfirst($request->name),
            'slug' => Str::slug($request->name),
            // 'm_categories' => $request->m_categories,
            'image' => $request->image,
            'created_by' => Auth::user()->id ?? 1,
        ];

        $validate = Validator::make($data, Category::RULES, Category::MESSAGE);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        if ($request->image) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folder = 'storage/category/';
            $file->move(public_path($folder), $filename);
            $url = $folder . $filename;
            $data['image'] = $url;
        }

        // $route = 'dataran';
        // if ($data['m_categories'] == 2) {
        //     $route = 'dinding';
        // }
        try {
            DB::beginTransaction();
            $cat = Category::create($data);
            DB::commit();
            // return JSON_RESPONSE("Success.\nSave new category product {$cat->name}", $cat);
            return JSON_RESPONSE("Success.\nSave new category product {$cat->name}", null, [
                'url' => route(self::ROUTE . 'index'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to save category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        $cat = Category::findOrFail($request->id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        $data = [
            'name' => ucfirst($request->name),
            'slug' => Str::slug($request->name),
            // 'm_categories' => $request->m_categories,
            'image' => $request->image,
            'created_by' => Auth::user()->id ?? 1,
        ];
        $rules = Category::RULES;
        $rules['image'] = 'nullable';
        $validate = Validator::make($data, $rules, Category::MESSAGE);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        $data['image'] = $cat->image;

        if ($request->image) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folder = 'storage/category/';
            $file->move(public_path($folder), $filename);
            $url = $folder . $filename;
            $data['image'] = $url;
        }

        // $route = 'dataran';
        // if ($data['m_categories'] == 2) {
        //     $route = 'dinding';
        // }

        try {
            DB::beginTransaction();
            $cat->update($data);
            DB::commit();
            return JSON_RESPONSE("Success.\nUpdate category product {$cat->name}", null, [
                'url' => route(self::ROUTE . 'index'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function status(int $id)
    {
        $cat = Category::findOrFail($id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        $active = true;

        if ($cat->is_active) $active = false;
        try {
            DB::beginTransaction();
            $cat->update(['is_active' => $active]);
            if ($cat->products->count()) {
                $cat->products->each->update(['is_active' => $active]);
            }
            DB::commit();
            return JSON_RESPONSE("Succes set status categori {$cat->name}");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$cat->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(string $slug, int $id)
    {
        $cat = Category::findOrFail($id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        try {
            DB::beginTransaction();
            if ($cat->products->count()) {
                $cat->products->each->delete();
            }
            $cat->delete();
            DB::commit();
            return JSON_RESPONSE("Success, \nDelete category {$cat->name}");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to delete category ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
