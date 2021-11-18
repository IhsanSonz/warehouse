<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Moloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Barang extends Moloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $collection = 'barangs';

    protected $fillable = [
        'nama',
        'harga_modal',
        'harga_jual',
        'deskripsi',
        'note',
    ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function stoks()
    {
        return $this->hasOne(Stok::class);
    }
}
