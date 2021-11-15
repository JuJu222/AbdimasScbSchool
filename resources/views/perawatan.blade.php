@extends('layout.main_layout')

@section('main_content')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Perawatan</h1>
        </div>
    </div>

    <div class="row container mt-3 d-flex justify-content-center">
        <div class="col-sm-5 mt-3  mb-3">
            <img src="img/img_pemeliharaan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 pt-3 pb-3">
            <h1>Laporan Pemeliharaan Gedung</h1>
            <p>Berisi Hasil Laporan Pelaksanaan Pemeliharaan Gedung Sekolah selama 1 Periode</p>
            <a class="btn btn-primary" href="{{ route('pemeliharaan.index') }}" role="button">Selengkapnya</a>
        </div>

        <br>
        <div class="col-sm-5 mt-3 mb-3">
            <img src="img/img_perawatan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 mt-3">
            <h1>Maintenance Perawatan Gedung</h1>
            <p>Berisi Hasil Laporan Pelaksanaan Perawatan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="{{ route('perawatan.index') }}" role="button">Selengkapnya</a>
        </div>

        <div class="container">
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Jenis Project</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Minggu</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @foreach ($currativeMaintenances as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->project->jenis_project }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->month }}</td>
                        <td>{{ $item->week }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('perawatan.edit', $item->currative_maintenance_id) }}" class="btn btn-warning">Edit</a>
                            <form class="d-inline" action="{{ route('perawatan.destroy', $item->currative_maintenance_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ route('perawatan.create') }}" class="btn btn-primary mt-3 mb-5">Add Preventive Maintenance</a>
        </div>
    </div>
@endsection
