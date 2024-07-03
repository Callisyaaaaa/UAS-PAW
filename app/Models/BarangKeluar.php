<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    public function stok_gudang()
    {
        return $this->belongsTo(StokGudang::class, 'stok_id');
    }
}
