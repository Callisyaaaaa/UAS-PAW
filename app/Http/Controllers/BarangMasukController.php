<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\StokGudang;
use App\Http\Requests\StoreBarangMasukRequest;
use App\Http\Requests\UpdateBarangMasukRequest;

class BarangMasukController extends Controller
{
    
    public function index()
    {
        
        $data = BarangMasuk::with('stok_gudang')->get();
        return view('barang_masuk.data', compact('data'));
    }

    
    public function create()
    {
        
        $stocks = StokGudang::all();
        return view('barang_masuk.add', compact('stocks'));
    }

    
    public function store(StoreBarangMasukRequest $request)
    {
        
        $request->validate([
            'stok_id' => 'required',
            'jumlah' => 'required',
        ]);

        $data = new BarangMasuk();
        $data->stok_id = $request->stok_id;
        $data->jumlah = $request->jumlah;

        $data->save();

        $stock = StokGudang::find($request->stok_id);
        $stock->stok += $request->jumlah;
        $stock->save();

        return redirect('/barang_masuk')->with('success', 'Data berhasil ditambahkan');
    }

    
    public function show(BarangMasuk $barangMasuk)
    {
        
    }

   
    public function edit(BarangMasuk $data)
    {
        
        $stocks = StokGudang::all();
        

        return view('barang_masuk.edit', compact('data', 'stocks'));
    }

    
    public function update(UpdateBarangMasukRequest $request, BarangMasuk $data)
    {
        
        $request->validate([
            'stok_id' => 'required',
            'jumlah' => 'required',
            'bukti' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',

        ]);
    
        $data->save();

        $data->stok_id = $request->stok_id;
        $data->jumlah = $request->jumlah;

        $data->save();

        return redirect('/barang_masuk')->with('success', 'Data berhasil diubah');
    }

   
    public function destroy(BarangMasuk $data)
    {
        
        $stock = StokGudang::find($data->stok_id);
        $stock->stok -= $data->jumlah;
        $stock->save();

        $data->delete();

        return redirect('/barang_masuk')->with('success', 'Data berhasil dihapus');
    }
}
