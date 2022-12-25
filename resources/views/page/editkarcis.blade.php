@extends('template')
@section('title')
Ubah Karcis
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Karcis</h5>
            </div>
            <div class="card-body">
                <form action="{{route('update-karcis', $karcis->id_karcis)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="col-sm-9 form-control" required>
                                    <option value="" selected disabled>- Pilih Kategori -</option>
                                    @foreach ($karcisx as $i => $kc)
                                    <option <?= $karcis->id_kategori == $kc->id_kategori ? 'selected' : '' ?> value="{{ $kc->id_kategori }}">
                                        {{ $kc->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $karcis->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="harga">Kategori</label>
                                <select name="harga" id="harga" class="col-sm-9 form-control" required>
                                    <option value="" selected disabled>- Pilih Harga -</option>
                                    @foreach ($karcisx as $i =>$kc)
                                    <option <?= $karcis->harga == $kc->harga ? 'selected' : '' ?> value="{{ $kc->harga }}">{{ $kc->harga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <img style="margin-bottom:5px;" src="{{asset('gambar/'. $karcis->gambar) }}" width="100" alt="">
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-dark" role="alert" style="font-size:small; color:black; height:205px">
                                *Keterangan Harga : <br>
                                Anak-Anak : Rp.5000 / Orang<br>
                                Remaja : Rp.10000 / Orang <br>
                                Dewasa : Rp.15000 / Orang <br><br>

                                *Kategori Umur : <br>
                                Anak-Anak : 0 s/d 12 Tahun <br>
                                Remaja : >12 s/d 18 Tahun <br>
                                Dewasa : 18+ Tahun <br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                        <a class="btn btn-primary btn-block" href="{{ route('karcis') }}">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection