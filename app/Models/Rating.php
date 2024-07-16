<?php

namespace App\Models;

use App\Models\Master\Product;
use App\Models\Master\ProductVarian;
use App\Models\Master\RatingBalasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden = [
        // 'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function created_date()
    {
        return date_format(date_create($this->created_at), 'd/m/Y');
    }

    public function varians()
    {

        return $this->belongsTo(ProductVarian::class, 'varian_id', 'id');
    }

    public function dateFull()
    {
        return date_format(date_create($this->created_at), 'd-m-Y H:i:s');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function balasan()
    {
        return $this->hasOne(RatingBalasan::class, 'rating_id');
    }

    public function ratingImage()
    {
        return $this->hasMany(ImageRating::class, 'rating_id');
    }
}
