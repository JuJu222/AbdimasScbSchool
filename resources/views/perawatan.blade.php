@extends('layout.main_layout')

@section('main_content')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Laporan</h1>
        </div>
    </div>

    <div class="row container mt-3 d-flex justify-content-center">
        <div class="col-sm-5 mt-3  mb-3">
            <img src="img/img_pemeliharaan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 pt-3 pb-3">
            <h1>Laporan Pemeliharaan Gedung</h1>
            <p>Berisi Hasil Laporan Pelaksanaan Pemeliharaan Gedung Sekolah selama 1 Periode</p>
            <a class="btn btn-primary" href="#" role="button">Selengkapnya</a>
        </div>

        <br>
        <div class="col-sm-5 mt-3 mb-3">
            <img src="img/img_perawatan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 mt-3">
            <h1>Maintenance Perawatan Gedung</h1>
            <p>Berisi Hasil Laporan Pelaksanaan Perawatan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="#" role="button">Selengkapnya</a>
        </div>

    </div>

@endsection