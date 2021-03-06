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
        <h1><b>Tambah Jadwal Koordinasi</b></h1>
    </div>


    <div class="container mt-5" style="margin-bottom: 300px">
        <form action="{{ route('koordinasi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label><h4><b>Tanggal & Jam</b></h4></label>
                <div class="mb-2"><mark>Contoh: 12/31/2021, 02:00 PM</mark></div>
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
                <label class="mt-3"><h4><b>Meeting ID</b></h4></label>
                <input type="text" name="meeting_id" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Meeting Passcode</b></h4></label>
                <input type="text" name="meeting_passcode" class="form-control">
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
@endsection
