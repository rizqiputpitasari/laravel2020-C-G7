<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','alamat','no_hp'];

    // satu pelanggan hanya punya banyak transaksi
    public function transaksi(){
    	return $this->hasMany("App\Transaksi");
    }

    public function user(){
    	return $this->belongsTo("App\User");
    }
}
