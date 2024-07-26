<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductFlashSale extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function varian()
    {
        return $this->belongsTo(ProductVarian::class, 'product_varian_id', 'id');
    }

    public function flashSale()
    {
        return $this->belongsTo(FlashSale::class, 'flash_sale_id', 'id');
    }
}
