<?php

namespace App\Http\Controllers\Master;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

    public function indexDataran()
    {
        return view('admin.kategoridataran');
    }

    public function formDataran()
    {
        return view('admin.tambahkategoridataran');
    }

    public function data(Request $request)
    {
        $query = Category::select('*');
        if ($request->is_active) {
            $query = $query->where('is_active', true);
        } else {
            $query = $query->where('is_active', false);
        }

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
                        <a href="#" class="btn btn-link" style="text-decoration: none;">Ubah</a>
                        <br />
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" style="text-decoration:none;"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"> Lainnya </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hapus Kategori</a></li>
                            <li><a class="dropdown-item" href="#">Lihat Detail Kategori</a>
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

    public function store(Request $request)
    {
        if (!empty($request->id)) return $this->update($request);
        $data = [
            'name' => ucfirst($request->name),
            'slug' => Str::slug($request->name),
            'm_categories' => $request->m_categories,
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

        $route = 'index-dataran';
        if ($data['m_categories'] == 2) {
            $route = 'index-dinding';
        }
        try {
            DB::beginTransaction();
            $cat = Category::create($data);
            DB::commit();
            // return JSON_RESPONSE("Success.\nSave new category product {$cat->name}", $cat);
            return JSON_RESPONSE("Success.\nSave new category product {$cat->name}", null, [
                'url' => route(self::ROUTE . $route),
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
}
