<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable =[
        'customer_id',
        'invoice',
        'total',
        'diskon',
        'sub_total'
    ];

    public function customer(): BelongsTo{
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function detail(): HasMany{
        return $this->hasMany(BarangMasukDetail::class,'barang_masuk_id');
    }
}
