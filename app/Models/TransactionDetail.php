<?php

namespace App\Models;

use App\Models\Master\Product;
use App\Models\Master\ProductVarian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function varian()
    {
        return $this->belongsTo(ProductVarian::class, 'product_varian_id', 'id');
    }
}
