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
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

        <table id="table"
               data-toggle="table"
               data-minimum-count-columns="2"
               data-pagination="false"
               data-id-field="id"
               data-page-size="1"
               data-smart-display="true">
            <thead>
            <tr>
                <th data-field="nama_equipment">Date Time</th>
                <th data-field="quantity">Tema Koordinasi</th>
                <th data-field="biaya">Link Zoom</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $coordination->date_time }}</td>
                <td>{{ $coordination->tema_koordinasi }}</td>
                <td>{{ $coordination->link_zoom }}</td>
            </tr>
            </tbody>
        </table>

        <form action="{{ route('koordinasi.laporStore', $coordination->coordination_id) }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <textarea name="keterangan" class="form-control"></textarea>
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
@endsection
