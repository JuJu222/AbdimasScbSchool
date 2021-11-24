@extends('layout.main_layout')

@section('main_content')
    <style>
        body::before{
            display: block;
            content: '';
            height: 60px;
        }
    </style>


    <div class="container mt-5">
        <h1><b>Tambah Status Pemeliharaan</b></h1>
    </div>


    <div class="container mt-5">
        <form action="{{ route('pemeliharaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label><h4><b>Tanggal & Jam</b></h4></label>
                <input type="datetime-local" name="date_time" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tema Koordinasi</b></h4></label>
                <input type="text" name="tema_koordinasi" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Link Zoom</b></h4></label>
                <input type="text" name="link_zoom" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Image</b></h4></label>
                <input class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <script>
        $('#equipment_id, #year').on('change', function (e) {
            let equipment_id = $("#equipment_id").val();
            let year = $("#year").val();

            location.href = '/pemeliharaan/create/' + equipment_id + '/' + year;
        });
    </script>
@endsection
