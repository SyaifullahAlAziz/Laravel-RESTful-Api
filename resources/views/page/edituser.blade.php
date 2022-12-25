@extends('template')
@section('title')
Tambah User
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Data User</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-user',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="">No Telpon</label>
                                <input type="number" name="no_telpon" class="form-control" value="{{ $user->no_telpon }}" placeholder="No Telpon">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}" placeholder="Alamat">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control" value="{{ $user->gambar }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="">
                                    <option value="" disabled selected>Select</option>
                                    <option <?= $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                                    <option <?= $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection