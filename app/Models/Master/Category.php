<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'image' => 'nullable|mimes:jpg,jpeg,png|max:5240',
        'm_categories' => 'required',
        'created_by' => 'required'
    ];

    const MESSAGE = [
        'required' => 'param :attribute required',
    ];
}
