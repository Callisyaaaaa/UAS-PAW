@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold ">Data Barang Keluar</h6>
            <a href="{{ url('barang_keluar/add') }}" class="btn btn-primary"><i class="fa fa-plus fs-5" aria-hidden="true"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 50px;">No</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Keluar</th>
                            <th>Tanggal</th>
                            <th style="width: 50px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nomor = 1;
                            foreach ($data as $x) { ?>
                                <tr class="text-center">
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $x->stok_gudang->nama }}</td>
                                    <td>{{ $x->stok_gudang->deskripsi }}</td>
                                    <td>{{ $x->jumlah }}</td>
                                    <td>{{ date('d-m-Y', strtotime($x->created_at)) }}</td>
                                    <td align="center">
                                        <a href="{{ url('barang_keluar/delete', $x->id) }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
