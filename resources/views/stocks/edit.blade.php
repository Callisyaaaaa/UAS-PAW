@extends('layout')

@section('content')

<body class="bg-gradient-success">
    <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000" data-pause="true">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card o-hidden border-0 shadow-lg my-5 ">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header">
                                                Edit Stok Gudang
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <form method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Nama Barang</td>
                                                                    <td><input type="text" name="nama" class="form-control" required value="{{ $data->nama }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Harga Modal</td>
                                                                    <td><input type="text" name="harga" class="form-control" required value="{{ $data->harga }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Stok</td>
                                                                    <td><input type="text" name="stok" class="form-control" readonly value="{{ $data->stok }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deskripsi</td>
                                                                    <td><textarea name="deskripsi" class="form-control" required>{{ $data->deskripsi }}</textarea></td>
                                                                </tr>
                                                            </table>
                                                            <div class="text-center mt-5">
                                                                <button class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
