<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class TransaksiStok extends Moloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $collection = 'transaksi_stoks';

    protected $fillable = [
        'qty',
        'is_keluar',
        'tgl_transaksi',
        'note',
    ];

    protected $dates = ['tgl_transaksi', 'created_at', 'updated_at', 'deleted_at'];

    public function stoks()
    {
        return $this->belongsTo(Stok::class, 'stok_id');
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
