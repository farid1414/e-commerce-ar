<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlashSale extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function productFlashSale()
    {
        return $this->hasMany(ProductFlashSale::class, 'flash_sale_id');
    }
}
