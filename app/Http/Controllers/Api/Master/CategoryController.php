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
            return ERROR_RESPONSE("Failed to update product {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
