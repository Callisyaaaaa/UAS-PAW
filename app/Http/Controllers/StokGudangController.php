<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use App\Http\Requests\StoreStokGudangRequest;
use App\Http\Requests\UpdateStokGudangRequest;

class StokGudangController extends Controller
{
   
    public function index()
    {
        
        $data = StokGudang::all();
        return view('stocks.data', compact('data'));
    }

    
    public function create()
    {
        
        return view('stocks.add');
    }

    
    public function store(StoreStokGudangRequest $request)
    {
        
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $data = new StokGudang();
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

        $data->save();

        return redirect('/stok')->with('success', 'Data berhasil ditambahkan');
    }

  
    public function show(StokGudang $stokGudang)
    {
        
    }

    
    public function edit(StokGudang $data)
    {
        

        return view('stocks.edit', compact('data'));
    }

    
    public function update(UpdateStokGudangRequest $request, StokGudang $data)
    {
        
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

        $data->save();

        return redirect('/stok')->with('success', 'Data berhasil diubah');
    }


    public function destroy(StokGudang $data)
    {
        
        $data->delete();
        return redirect('/stok')->with('success', 'Data berhasil dihapus');
    }
}
