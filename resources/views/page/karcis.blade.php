@extends('template')
@section('title')
Data Karcis
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">

                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Data Karcis</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mulai Tanggal</label>
                                        <input class="form-control" type="date" name="mulai">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sampai Tanggal</label>
                                        <input class="form-control" type="date" name="sampai">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">.</label>
                                    <button class="btn btn-primary btn-block" type="submit">Filter</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>


            </div>
            @if(isset($_GET['mulai']))
            @php
            $datakarcis = DB::table('karcis')
            ->join('kategori', 'karcis.id_kategori', '=', 'kategori.id_kategori')
            ->whereBetween('karcis.tanggal', [Request::get('mulai'), Request::get('sampai')])
            ->get();
            @endphp
            <div class="card-header">
                <div class="float-right">
                    <a href="{{route('input-karcis')}}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datakarcis as $kc=> $isi)
                        <tr>
                            <td>{{ $kc + 1 }}</td>
                            <td>{{ $isi->nama_kategori}}</td>
                            <td>{{ $isi->tanggal}}</td>
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td><img src="{{ asset('gambar/'.$isi->gambar) }}" width="100" alt=""></td>
                            <td>
                                <a href="{{ route('print-karcis',$isi->id_karcis) }}" class="btn btn-primary"> <i class="fa fa-print"></i></a>
                                <a href="{{ route('edit-karcis',$isi->id_karcis) }}" class="btn btn-success"> <i class="fa fa-edit"></i></a>
                                <a href="{{ route('hapus-karcis',$isi->id_karcis) }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="card-header">
                <div class="float-right">
                    <a href="{{route('input-karcis')}}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karcis as $kc=> $isi)
                        <tr>
                            <td>{{ $kc + 1 }}</td>
                            <td>{{ $isi->nama_kategori}}</td>
                            <td>{{ $isi->tanggal}}</td>
                            <td>{{ $isi->nama }}</td>
                            <td>{{ $isi->harga }}</td>
                            <td><img src="{{ asset('gambar/'.$isi->gambar) }}" width="100" alt=""></td>
                            <td>
                                <a href="{{ route('print-karcis',$isi->id_karcis) }}" class="btn btn-primary"> <i class="fa fa-print"></i></a>
                                <a href="{{ route('edit-karcis',$isi->id_karcis) }}" class="btn btn-success"> <i class="fa fa-edit"></i></a>
                                <a href="{{ route('hapus-karcis',$isi->id_karcis) }}" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
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