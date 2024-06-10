<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'harga_jual_barang',
        'harga_beli_barang',
        'stok_barang',
    ];

    protected $casts = [
      'kategori_id' => 'array',
    ];

    public function kategori() : BelongsTo{
        return $this->belongsTo(MasterKategoriBarang::class,'kategori_id');
    }


}
