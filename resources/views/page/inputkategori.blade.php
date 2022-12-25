@extends('template')
@section('title')
Tambah Kategori
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Data Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{route('simpan-kategori')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" placeholder="Kategori">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection