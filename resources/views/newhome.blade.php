@extends('layout.main_layout')

@section('main_content')

<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h1>Sekolah<br>
                    <span class="text-warning">Citra Berkat Surabaya
                    </span></h1>
                    <p class="lead my-4">
                        "Entrepreneurship Learning with Academic Excellence"
                    </p>
                    <button class="btn btn-primary btn-lg">Start</button>
            </div>
            <img class="img-fluid w-50 d-none d-sm-block" src="img/front_gedung.jpeg" alt="">
        </div>
    </div>
</section>

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
                        <h3 class="card-title mb-3">
                            Perawatan
                        </h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis nam cum, quaerat nulla incidunt cupiditate.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                    
                </div>
            </div>
            <div class="col-md">
                <div class="card bg-dark text-light">
                    <div class="card-body card-center">
                        <div class="h1 mb-3">
                            <img class="img-fluid w-100 p-3 " src="img/img_pemeliharaan.jpg" alt="">
                        </div>
                        <h3 class="card-title mb-3">
                            Pemeliharaan
                        </h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis nam cum, quaerat nulla incidunt cupiditate.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                    
                </div>
            </div>
        </div>
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
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">Apa fungsi dari Website ini?</button>									
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque, tempora.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Apa saja data yang bisa dilihat?</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, sapiente!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">Siapa saja yang dapat menambah dan mengubah data?</button>                     
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, maxime.</p>
                    </div>
                </div>
            </div>
        </div>    
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


@endsection