@extends('template')
@section('title')
Data User
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h5>Data User</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('input-user')}}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->no_telpon }}</td>
                            <td>{{ $isi->alamat }}</td>
                            <td>{{ $isi->email }}</td>
                            <td>{{ $isi->jenis_kelamin }}</td>
                            <td><img src="{{ asset('gambar/'.$isi->gambar) }}" width="100" alt=""></td>
                            <td>
                                <a href="{{ route('edit-user',$isi->id) }}" class="btn btn-success"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{ route('hapus-user',$isi->id) }}" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus</a>
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