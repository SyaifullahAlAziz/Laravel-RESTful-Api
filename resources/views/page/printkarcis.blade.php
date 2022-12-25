<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK TIKET</title>

</head>

<body>

    <table class="table table-borderless">
        @csrf
        <br>
        <thead>
            <div>
                <div>
                    <img style="position: absolute; margin-left:20px; " src="../gambar/logo_padang.png" alt="" class="img-fluid" width="75px">
                </div>
                <div style="margin-left: 125px;">
                    <h1 style="margin-bottom: 40px;">DINAS PARIWISATA KOTA PADANG</h1>
                    <h4 style="margin-bottom: 20px;">Jl. Gandaria No.56, Jati Baru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129</h4>
                </div>
            </div>
        </thead>
    </table>

    <hr style="border: .1px solid #000;">

    <h2 style="margin-left: 150px;">
        <u> Tiket Masuk Pantai Padang </u> <br>
    </h2>
    <h4 style="margin-left: 50px;">Jl. Samudera, Purus, Kec. Padang Bar., Kota Padang, Sumatera Barat 25115</h4>
    <h3 style="position: relative;  left:550px; bottom:100px;">NOMOR :
        00{{ $karcis->id_karcis }}
    </h3>

    <h1 style="position:relative; left:200px; bottom:30px;">
        Rp. {{$karcis->harga }}
    </h1>

    <h3 style="margin-left: 850px; margin-bottom:-100px; margin-top:20px; position:relative; bottom:70px; right:400px; ">
        Kategori : {{ $karcis->nama_kategori }}
    </h3>
    <p style="margin-left: 40px; margin-right: 40px;">


        <br> <br>
        <b>Perhatian : <br>
            1. Karcis harap disimpan dengan baik <br>
            2. Kendaraan harap dikunci dengan baik <br>
            3. Kerusakan atau kehilangan kendaraan bukan tanggung jawab pengelola</b>
    </p>

    <script>
        window.print();
    </script>

</body>

</html>