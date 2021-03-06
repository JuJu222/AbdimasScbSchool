@extends('layout.main_layout')

@section('main_content')

<style>
    body::before{
    display: block;
    content: '';
    height: 60px;
}
</style>

@include('layout.header')

<!--Box -->
<section class="p-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body text-center">
                        <div class="h1 mb-3">
                            <img class="img-fluid w-100 p-3 " src="img/img_perawatan.jpg" alt="">
                        </div>
                        <h3 class="card-title mb-3 fw-bold">
                            Perawatan
                        </h3>
                        <p class="card-text">
                            Pengecatan Gedung Berkala, Pengecatan Lapangan Basket, Perbaikan Kebocoran, Renovasi Gedung, dan Pembangunan Fasilitas Tambahan
                        </p>
                        <a href="/perawatan" class="btn btn-primary mb-3">Selengkapnya</a>
                    </div>

                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body card-center">
                        <div class="h1 mb-3">
                            <img class="img-fluid w-100 p-3 " src="img/img_pemeliharaan.jpg" alt="">
                        </div>
                        <h3 class="card-title mb-3 fw-bold">
                            Pemeliharaan
                        </h3>
                        <p class="card-text">
                            AC, Panel Listrik, Lampu, Arrester, Eksterior/Interior Gedung, Hydrant, Torent, Genset, Alarm, Pest Control, Landscape, dan Pembersihan Selokan
                        </p>
                        <a href="/pemeliharaan" class="btn btn-primary mb-3">Selengkapnya</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dokumen Pemeliharaan Gedung dan Fasilitas -->

<section class="p-5">
    <div class="container text-center">
        <h2 class="text-center">Pedoman Pemeliharaan Gedung dan Fasilitasnya</h2>
        <a href="https://drive.google.com/file/d/1sw7r73a3yOz0M1jP5c7-NPs9ZXCD-Aqu/view?usp=sharing" class="btn btn-info text-center">Dapat Dilihat Disini</a>
    </div>
</section>


<!-- FAQ -->
<section id="questions" class="p-5">
    <div class="container">
        <h2 class="text-center mb-4">
            Pertanyaan yang Sering Ditanyakan
        </h2>

        <div class="accordion" id="myAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne"><b>Apa fungsi dari Website ini?</b></button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Website ini bertujuan untuk melakukan monitoring berbagai kegiatan pemeliharaan dan perawatan gedung, fasilitas yang tersedia. Sehingga lebih tepat sasaran dan terealisasi dengan baik.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"><b>Apa saja data yang bisa dilihat?</b></button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Website ini memperlihatkan status dari pemeliharaan dan perawatan fasilitas. Selain itu akan terlihat juga jadwal koordinasi sekolah-sekolah dalam pelaksanaan pertemuan.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree"><b>Siapa saja yang dapat menambah dan mengubah data?</b></button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Hanya admin dan pihak yang diizinkan dapat mengubah dan menambah data. Bagi pengunjung hanya dapat melihat status data yang telah ada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


@endsection
