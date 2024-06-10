<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasukDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_masuk_id',
        'barang_id',
        'jumlah',
        'total',
        'harga',
        'diskon',
        'sub_total'
    ];

    public function barangMasuk(): BelongsTo{
        return $this->belongsTo(BarangMasuk::class, 'barang_masuk_id');
    }

    public function barang(): BelongsTo{
        return $this->belongsTo(MasterBarang::class, 'barang_id');
    }
}
