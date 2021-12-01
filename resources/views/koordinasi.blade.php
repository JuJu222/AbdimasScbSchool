@extends('layout.main_layout')

@section('main_content')

    @include('layout.header')
    <div class="container mt-5 mb-5">
        <h1><b>Jadwal Koordinasi</b></h1>
    </div>

    <div class="container mt-3">
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-en-US.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

        <div id="toolbar">
            <button id="remove" class="btn btn-danger" disabled>Delete</button>
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
                <th data-field="date_time" data-sortable="true">Date Time</th>
                <th data-field="tema_koordinasi" data-filter-control="select" data-sortable="true">Tema Koordinasi</th>
                <th data-field="link_zoom">Link Zoom</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="image">Image</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($coordinations as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->date_time }}</td>
                    <td>{{ $item->tema_koordinasi }}</td>
                    <td>{{ $item->link_zoom }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->image_path }}</td>
                    <td>
                        <a href="{{ route('koordinasi.lapor', $item->coordination_id) }}" class="btn btn-primary">Lapor</a>
                        <a href="{{ route('koordinasi.edit', $item->coordination_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('koordinasi.destroy', $item->coordination_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('koordinasi.create') }}" class="btn btn-primary mt-3 mb-5">Add Coordination</a>
    </div>
@endsection
