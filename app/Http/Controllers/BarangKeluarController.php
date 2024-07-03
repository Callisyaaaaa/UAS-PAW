<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\StokGudang;
use App\Http\Requests\StoreBarangKeluarRequest;
use App\Http\Requests\UpdateBarangKeluarRequest;

class BarangKeluarController extends Controller
{
    
    public function index()
    {
        

        $data = BarangKeluar::with('stok_gudang')->get();
        return view('barang_keluar.data', compact('data'));
    }

    
    public function create()
    {
        
        $stocks = StokGudang::where('stok', '>', 0)->get();
        return view('barang_keluar.add', compact('stocks'));
    }

   
    public function store(StoreBarangKeluarRequest $request)
    {
        
        $request->validate([
            'stok_id' => 'required',
            'jumlah' => 'required',
        ]);

        $data = new BarangKeluar();
        $data->stok_id = $request->stok_id;
        $data->jumlah = $request->jumlah;

        $data->save();

        $stock = StokGudang::find($request->stok_id);
        $stock->stok -= $request->jumlah;
        $stock->save();

        return redirect('/barang_keluar')->with('success', 'Data berhasil ditambahkan');
    }

    
    public function show(BarangKeluar $barangKeluar)
    {
        
    }

    
    public function edit(BarangKeluar $data)
    {
        //
        $stocks = StokGudang::where('stok', '>', 0)->get();
        return view('barang_keluar.edit', compact('data', 'stocks'));
    }

  
    public function update(UpdateBarangKeluarRequest $request, BarangKeluar $data)
    {
        //
        $request->validate([
            'stok_id' => 'required',
            'jumlah' => 'required',
        ]);

        $data->stok_id = $request->stok_id;
        $data->jumlah = $request->jumlah;

        $data->save();

        return redirect('/barang_keluar')->with('success', 'Data berhasil diubah');
    }

   
    public function destroy(BarangKeluar $data)
    {
        
        $stock = StokGudang::find($data->stok_id);
        $stock->stok += $data->jumlah;
        $stock->save();

        $data->delete();

        return redirect('/barang_keluar')->with('success', 'Data berhasil dihapus');
    }
}
