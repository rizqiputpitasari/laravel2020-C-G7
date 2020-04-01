<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKategori extends Model
{
    protected $table = "barang_kategori";
    protected $primaryKey = "id";
    protected $fillable = ['nama_kategori'];

    // satu kategori bisa punya banyak barang
    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
