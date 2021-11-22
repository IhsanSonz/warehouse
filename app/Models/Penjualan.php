<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Penjualan extends Moloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $collection = 'penjualans';

    protected $fillable = [
        'transaksi_stok_id',
        'nama_barang',
        'harga_modal',
        'total_harga',
        'note',
    ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function transaksi_stoks()
    {
        return $this->belongsTo(TransaksiStok::class, 'transaksi_stok_id');
    }
}
