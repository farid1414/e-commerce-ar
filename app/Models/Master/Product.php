<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RULES = [
        'name'  => 'required',
        'm_categories' => 'required',
        'categori_id' => 'required',
        'sub_name' => 'nullable',
        'stock' => 'required|numeric',
        'harga' => 'required|numeric',
        'description' => 'nullable',
        'harga_ongkitr' => 'nullable|numeric',
        'thumbnail' => 'required|mimes:jpg,jpeg,png|max:5240',
        'link_ar'   => 'required',
        'link_ar_ios' => 'required',
        'link_skybox' => 'required'
    ];

    const MESSAGE = [
        'required' => 'param :attribute required',
        'numeric' => 'param :attribute is numeric',
    ];

    const CUSTOM_NAME  = [
        'm_categories' => "Master categories",
        'sub_name' => "Sub name product",
        'harga_ongkir' => "Harga ongkir",
        'categori_id' => "Category product"
    ];
}
