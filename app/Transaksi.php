<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "tranasksi";
    protected $primaryKey = "id";
    protected $fillable = ["id_pelanggan", "id_barang", "jumlah_barang", "total_harga", "keterangan"];

	// satu transaksi hanya punya 1 barang
    public function barang(){
    	return $this->belongsTo("App\Barang", "id_barang");
    }

    // satu transaksi bisa punya banyak pelanggan
    public function pelanggan(){
    	return $this->belongsToMany("App\Pelanggan", "id_pelanggan");
    }
}
