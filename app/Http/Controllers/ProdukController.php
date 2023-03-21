<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $data = [
            'produk' => $produk,
        ];
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        $namaProduk = $request->namaProduk;
        $keterangan = $request->keterangan;
        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $produk = [
            'namaProduk' => $namaProduk,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'jumlah' => $jumlah,
        ];
        Produk::create($produk);
        return redirect('/produk')->with('success', 'Data Produk Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $data = [
            'produk' => $produk,
        ];
        return view('show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $data = [
            'produk' => $produk
        ];
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $namaProduk = $request->namaProduk;
        $keterangan = $request->keterangan;
        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $data = [
            'namaProduk' => $namaProduk,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'jumlah' => $jumlah,
        ];
        Produk::where('id', $produk->id)->update($data);
        return redirect('/produk')->with('success', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/produk')->with('success', 'Data Produk Berhasil Dihapus!');
    }
}
