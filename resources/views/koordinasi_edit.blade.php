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
                <div class="mb-2"><mark>Contoh: 12/31/2021, 02:00 PM</mark></div>
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
                <label class="mt-3"><h4><b>Meeting ID</b></h4></label>
                <input type="text" name="meeting_id" class="form-control" value="{{ $coordination->meeting_id }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Meeting Passcode</b></h4></label>
                <input type="text" name="meeting_passcode" class="form-control" value="{{ $coordination->meeting_passcode }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <textarea name="keterangan" class="form-control">{{ $coordination->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Link Dokumen</b></h4></label>
                <input type="text" name="link_dokumen" class="form-control" value="{{ $coordination->link_dokumen }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Image</b></h4></label>
                @if ($coordination->image_path)
                    <div>
                        <a target="_blank" rel="noopener noreferrer" href="{{ asset('img/uploads/' . $coordination->image_path) }}">Image Link</a>
                    </div>
                @endif
                <input class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-2">Submit</button>
        </form>
        <form action="{{ route('koordinasi.destroyImage', $coordination->coordination_id) }}" method="POST">
            @csrf
            @if ($coordination->image_path)
                <button type="submit" class="btn btn-danger mb-5">Delete Image</button>
            @else
                <button type="submit" class="btn btn-danger mb-5" disabled>Delete Image</button>
            @endif
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
