@extends('layout.main_layout')

@section('main_content')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Perawatan</h1>
        </div>
    </div>

    <div class="container mt-3">
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
            @foreach ($currativeMaintenances as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->project->jenis_project }}</td>
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
                        <a href="{{ route('perawatan.edit', $item->currative_maintenance_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('perawatan.destroy', $item->currative_maintenance_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="perawatan/create/1/2020" class="btn btn-primary mt-3 mb-5">Add Currative Maintenance</a>
    </div>
@endsection
