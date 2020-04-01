<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKategori;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKategori = BarangKategori::all();

        return view('Kategori_barang.data-kategori', compact('dataKategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategori_barang.create-kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);
        BarangKategori::create([
            'nama_kategori' => $request->nama_kategori,
           
        ]);
        
        return redirect()->route('kategori.index')->with('msg', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $dataKategori = BarangKategori::find($id);
        // return view('Data_Kategori.data-kategori', compact('dataKategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $dataKategori= BarangKategori::find($id);
        return view('Kategori_barang.edit-kategori',compact('dataKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi =  $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        BarangKategori::whereId($id)->update($validasi);
        return redirect()->route('kategori.index')->with('msg', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = BarangKategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('msg', 'Data anda telah dihapus!');
    }
}
