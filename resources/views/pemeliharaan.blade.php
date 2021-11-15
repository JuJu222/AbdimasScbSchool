@extends('layout.main_layout')

@section('main_content')
    <div class="has-bg-img bg-dark" style="height:300px">
        {{-- <img src="img/img_pemeliharaan.jpg" class="bg-img" style="height: 300px"> --}}


        <div class="container text-white">
            <h1 class="pt-5 text-center">Pemeliharaan</h1>
        </div>
    </div>

    <div class="row container mt-3 d-flex justify-content-center">
        <div class="col-sm-5 mt-3 mb-3">
            <img src="img/img_pemeliharaan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 mt-3 pt-3 pb-3">
            <h1>Maintenance Pemeliharaan</h1>
            <p>Berisi Timeline Perencanaan, Penambahan Equipment hingga Melihat Hasil dari Pemeliharaan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="{{ route('pemeliharaan.index') }}" role="button">Selengkapnya</a>
        </div>

        <div class="col-sm-5 mt-3 mb-3">
            <img src="img/img_perawatan.jpg" alt="" width="320px" height="240px">
        </div>

        <div class="col-sm-5 mt-3 pt-3 pb-3">
            <h1>Maintenance Pemeliharaan</h1>
            <p>Berisi Timeline Perencanaan, Penambahan Equipment hingga Melihat Hasil dari Pemeliharaan Gedung Sekolah selama 1 Periode </p>
            <a class="btn btn-primary" href="{{ route('perawatan.index') }}" role="button">Selengkapnya</a>
        </div>






    </div>
    <div class="container">
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-en-US.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

        <div id="toolbar">
            <button id="remove" class="btn btn-danger" disabled>
                <i class="fa fa-trash"></i> Delete
            </button>
        </div>
        <table id="table"
               data-toggle="table"
               data-search="true"
               data-filter-control="true"
               data-show-export="true"
               data-click-to-select="true"
               data-show-columns="true"
               data-show-columns-toggle-all="true"
               data-minimum-count-columns="2"
               data-pagination="true"
               data-id-field="id"
               data-page-size="10"
               data-page-list="[10, 25, 50, 100, all]"
               data-smart-display="false"
               data-toolbar="#toolbar">
            <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-field="nama_equipment" data-filter-control="select" data-sortable="true">Nama Equipment</th>
                <th data-field="year" data-filter-control="select" data-sortable="true">Tahun</th>
                <th data-field="month" data-filter-control="select" data-sortable="true">Bulan</th>
                <th data-field="week" data-filter-control="select" data-sortable="true">Minggu</th>
                <th data-field="status" data-filter-control="select" data-sortable="true">Status</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($preventiveMaintenances as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->equipment->nama_equipment }}</td>
                    <td>{{ $item->year }}</td>
                    <td>
                        @if ($item->month === 1)
                            Januari
                        @elseif ($item->month === 2)
                            Februari
                        @elseif ($item->month === 3)
                            Maret
                        @elseif ($item->month === 4)
                            April
                        @elseif ($item->month === 5)
                            Mei
                        @elseif ($item->month === 6)
                            Juni
                        @elseif ($item->month === 7)
                            Juli
                        @elseif ($item->month === 8)
                            Agustus
                        @elseif ($item->month === 9)
                            September
                        @elseif ($item->month === 10)
                            Oktober
                        @elseif ($item->month === 11)
                            November
                        @elseif ($item->month === 12)
                            Desember
                        @endif
                    </td>
                    <td>{{ $item->week }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('pemeliharaan.edit', $item->preventive_maintenance_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('pemeliharaan.destroy', $item->preventive_maintenance_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="pemeliharaan/create/1/2020" class="btn btn-primary mt-3 mb-5">Add Preventive Maintenance</a>
    </div>
 @endsection
