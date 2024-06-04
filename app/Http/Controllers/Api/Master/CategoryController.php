<?php

namespace App\Http\Controllers\Api\Master;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Category;
use App\Utils\Helpers\MediaHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($request->id)) return $this->update($request);
        $data = [
            'name' => $request->name,
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

        try {
            DB::beginTransaction();
            $cat = Category::create($data);
            DB::commit();
            return JSON_RESPONSE("Success.\nSave new category product {$cat->name}", $cat);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        $cat = Category::findOrFail($request->id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'm_categories' => $request->m_categories,
            'image' => $request->image,
            'created_by' => Auth::user()->id ?? 1,
        ];

        $validate = Validator::make($data, Category::RULES, Category::MESSAGE);
        if ($validate->fails()) return ERROR_RESPONSE("Error validation", $validate->getMessageBag()->first() ?? null, Response::HTTP_UNPROCESSABLE_ENTITY);

        if ($cat->image) $data['image'] = $cat->image;
        if ($request->image) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $folder = 'storage/category/';
            $file->move(public_path($folder), $filename);
            $url = $folder . $filename;
            $data['image'] = $url;
        }

        try {
            DB::beginTransaction();
            $cat->update($data);
            DB::commit();
            return JSON_RESPONSE("Succes \nUpdate category {$data['name']} ");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        $cat = Category::findOrFail($id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        try {
            DB::beginTransaction();
            $cat->delete();
            DB::commit();
            return JSON_RESPONSE("Success delete category");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to delete category ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function status(Request $request)
    {
        if (!$request->category_id) return ERROR_RESPONSE("Category id required", null, Response::HTTP_UNPROCESSABLE_ENTITY);

        $cat = Category::findOrFail($request->category_id);
        if (!$cat) return ERROR_RESPONSE("Category not found");

        $status = true;
        $msg = "Success Active category {$cat->name}";

        if ($cat->is_active) {
            $status = false;
            $msg = "Success Non-Active category {$cat->name}";
        }
        try {
            DB::beginTransaction();
            $cat->update(['is_active' => $status]);
            DB::commit();
            return JSON_RESPONSE($msg);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$cat->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
