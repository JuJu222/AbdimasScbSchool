<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Maintenance - SCB Surabaya</title>
</head>
<body>
    @include('layout.navigation_layout')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Maintenance</h1>
        </div>
    </div>

    <div class="row container mt-3 d-flex justify-content-center">
        <div class="col-sm-5 float-end">
            <img src="img/img_pemeliharaan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5">
            <h1>Maintenance Pemeliharaan</h1>
            <p>Berisi Timeline Perencanaan, Penambahan Equipment hingga Melihat Hasil dari Pemeliharaan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="{{ route('pemeliharaan.index') }}" role="button">Selengkapnya</a>
        </div>

        <div class="col-sm-5">
            <img src="img/img_perawatan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 mt-3">
            <h1>Maintenance Perawatan</h1>
            <p>Berisi Timeline Perencanaan, Penambahan Equipment hingga Melihat Hasil dari Pemeliharaan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="{{ route('perawatan.index') }}" role="button">Selengkapnya</a>
        </div>






    </div>

    {{-- <div class="row container mt-3">
        <div class="col-sm-6">

        </div>

        <div class="col-sm-6 mt-3">
            <h1>Maintenance Perawatan</h1>
            <p>Berisi Timeline Perencanaan, Penambahan Equipment hingga Melihat Hasil dari Perawatan Gedung Sekolah selama 1 Periode</p>
            <a class="btn btn-primary" href="#" role="button">Selengkapnya</a>
        </div>
    </div> --}}
</body>
</html>
