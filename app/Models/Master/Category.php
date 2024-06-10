<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    const RULES = [
        'name' => 'required',
        'image' => 'required|mimes:jpg,jpeg,png|max:5240',
        'm_categories' => 'required',
        'created_by' => 'required'
    ];

    const MESSAGE = [
        'required' => 'param :attribute required',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'categori_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function created_date()
    {
        return date_format(date_create($this->created_at), 'd/m/Y H:i:s');
    }

    public function date_indo()
    {
        return Carbon::parse($this->created_at)->translatedFormat('l, j F Y H:i:s');
    }

    public function masterCat()
    {
        return $this->belongsTo(MCategory::class, 'm_categories', 'id');
    }
}
