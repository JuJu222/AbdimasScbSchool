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
        <h1><b>Edit Koordinasi</b></h1>
    </div>


    <div class="container mt-3">
        <form action="{{ route('koordinasi.update', $coordination->coordination_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label><h4><b>Tanggal & Jam</b></h4></label>
                <input type="datetime-local" name="date_time" class="form-control" value="{{ $coordination->date_time }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tema Koordinasi</b></h4></label>
                <input type="text" name="tema_koordinasi" class="form-control" value="{{ $coordination->tema_koordinasi }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Link Zoom</b></h4></label>
                <input type="text" name="link_zoom" class="form-control" value="{{ $coordination->link_zoom }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <input type="text" name="keterangan" class="form-control" value="{{ $coordination->keterangan }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Image</b></h4></label>
                @if ($coordination->image_path)
                    <div>
                        <a target="_blank" rel="noopener noreferrer" href="{{ asset('img/uploads/' . $coordination->image_path) }}">Image Link</a>
                    </div>
                @endif
                <input class="form-control mt-3" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
