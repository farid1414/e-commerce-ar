<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $hidden = [
        // 'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REASON = [
        'not_needed' => "Ingin merubah rincian & membuat pesanan baru",
        'ordered_mistake' => "Lainnya/berubah pikiran."
    ];

    public function created_date()
    {
        return date_format(date_create($this->created_at), 'd-m-Y H:i:s');
    }

    public function payment_date()
    {
        return date_format(date_create($this->payment_at), 'd-m-Y H:i:s');
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'transaction_id', 'id');
    }
}
