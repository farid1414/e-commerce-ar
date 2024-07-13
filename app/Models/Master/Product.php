<?php

namespace App\Models\Master;

use App\Models\Rating;
use App\Models\TransactionDetail;
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
        'link_skybox' => 'nullable'
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'categori_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function varians()
    {
        return $this->hasMany(ProductVarian::class, 'product_id');
    }
    public function masterCat()
    {
        return $this->belongsTo(MCategory::class, 'm_categories', 'id');
    }
    public function getImage()
    {
        return url($this->thumbnail);
    }
    public function flashSale()
    {
        return $this->hasMany(ProductFlashSale::class, 'product_id', 'id');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }
}
