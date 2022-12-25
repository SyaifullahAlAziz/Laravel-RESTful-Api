@extends('template')
@section('title')
Data Kategori
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data Kategori</h5>
                </div>
                <div class="float-right">
                    <a href="{{ route('input-kategori') }}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $k=> $isi)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $isi->nama_kategori }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td>
                                <a href="{{ route('edit-kategori', $isi->id_kategori) }}" class="btn btn-success"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-kategori', $isi->id_kategori) }}" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- alert -->
@if (session('success') == TRUE)
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{session("success")}}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@endsection