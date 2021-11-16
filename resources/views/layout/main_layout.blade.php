<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/app.css">
    <title>@yield('title')</title>
</head>
<body>

    @include('layout.navigation_layout')

    <div>
        @yield('main_content')

    </div>

    {{-- <footer style="margin-top: 100px">
        <div id="sticky-footer"class="justify-content-center fixed-bottom text-center p-3 text-light" style="background-color: rgb(7, 0, 132);">
            <p>Copyright &copy; 2021 | Citra Berkat School Surabaya</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer> --}}

    <!--Footer New -->
    <footer class="p-3 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2021 | Citra Berkat School Surabaya</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-3">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>