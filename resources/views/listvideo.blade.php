@extends('layout.main_layout')

@section('main_content')

@include('layout.header')

<section >
    <h1 class="text-center mt-5 fw-bold">Video</h1>

    <h2 class="card-body text-center">Innovation Award 2021 Sekolah Citra Kasih & Citra Berkat</h2>
    <div class="d-flex justify-content-center" >
        <iframe width="560" height="315" src="https://www.youtube.com/embed/tNlbrFqg2JY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <h2 class="card-body text-center mt-5" >Ciputra Group Innovation Award 2020</h2>
    <div class="d-flex justify-content-center mb-5" >
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pbu_l7Ypots" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    
</section>

@endsection