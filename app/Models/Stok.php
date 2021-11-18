<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Stok extends Moloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $collection = 'stoks';

    protected $fillable = [
        'qty',
        'note',
    ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function transaksi_stoks()
    {
        return $this->hasMany(TransaksiStok::class);
    }
}
