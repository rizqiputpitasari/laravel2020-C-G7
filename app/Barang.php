<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['jenis', "id_kategori", 'type','jumlah'];

    // satu barang hanya memiliki satu kategori 
    public function barangkategori()
    {
        return $this->belongsTo('App\BarangKategori', 'id_kategori');
    }
}
