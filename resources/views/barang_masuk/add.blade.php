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
                                        <div class="card">
                                            <div class="card-header">
                                                Tambah Barang Masuk
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <form method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Barang</td>
                                                                    <td>
                                                                        <select name="stok_id" class="form-control" required>
                                                                            <option value="">Pilih Barang</option>
                                                                            @foreach($stocks as $stock)
                                                                            <option value="{{ $stock->id }}">{{ $stock->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah</td>
                                                                    <td>
                                                                        <input type="number" name="jumlah" class="form-control" required>
                                                                    </td>
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
