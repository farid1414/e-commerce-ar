<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RatingBalasan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RULES = [
        'rating_id' => 'required',
        'balasan' => 'required'
    ];

    const MESSAGE = [
        'required' => ':attribute is required'
    ];

    public function created_date()
    {
        return date_format(date_create($this->created_at), 'd/m/Y');
    }
}
