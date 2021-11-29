@extends('layout.main_layout')

@section('main_content')
    <style>
        body::before{
            display: block;
            content: '';
            height: 60px;
        }
    </style>


    @include('layout.header')

    <div class="container mt-5">
        <h2><b>Status Perawatan</b></h2>
    </div>

    <div class="container mt-3">
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-en-US.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

        <div id="toolbar">
            <a href="{{ route('projects.index') }}" class="btn btn-primary">Projects</a>
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
                <th data-field="jenis_project" data-filter-control="select" data-sortable="true">Jenis Project</th>
                <th data-field="quantity" data-sortable="true">Quantity</th>
                <th data-field="biaya" data-sortable="true">Biaya</th>
                <th data-field="year_plan" data-filter-control="select" data-sortable="true">Tahun Perencanaan</th>
                <th data-field="month_plan" data-filter-control="select" data-sortable="true">Bulan Perencanaan</th>
                <th data-field="week_plan" data-filter-control="select" data-sortable="true">Minggu Perencanaan</th>
                <th data-field="status" data-filter-control="select" data-sortable="true">Status</th>
                <th data-field="year_real" data-filter-control="select" data-sortable="true">Tahun Realisasi</th>
                <th data-field="month_real" data-filter-control="select" data-sortable="true">Bulan Realisasi</th>
                <th data-field="week_real" data-filter-control="select" data-sortable="true">Minggu Realisasi</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="image">Image</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($currativeMaintenances as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->project->jenis_project }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->year_plan }}</td>
                    <td>
                        @if ($item->month_plan === 1)
                            Januari
                        @elseif ($item->month_plan === 2)
                            Februari
                        @elseif ($item->month_plan === 3)
                            Maret
                        @elseif ($item->month_plan === 4)
                            April
                        @elseif ($item->month_plan === 5)
                            Mei
                        @elseif ($item->month_plan === 6)
                            Juni
                        @elseif ($item->month_plan === 7)
                            Juli
                        @elseif ($item->month_plan === 8)
                            Agustus
                        @elseif ($item->month_plan === 9)
                            September
                        @elseif ($item->month_plan === 10)
                            Oktober
                        @elseif ($item->month_plan === 11)
                            November
                        @elseif ($item->month_plan === 12)
                            Desember
                        @endif
                    </td>
                    <td>{{ $item->week_plan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->year_real }}</td>
                    <td>
                        @if ($item->month_real === 1)
                            Januari
                        @elseif ($item->month_real === 2)
                            Februari
                        @elseif ($item->month_real === 3)
                            Maret
                        @elseif ($item->month_real === 4)
                            April
                        @elseif ($item->month_real === 5)
                            Mei
                        @elseif ($item->month_real === 6)
                            Juni
                        @elseif ($item->month_real === 7)
                            Juli
                        @elseif ($item->month_real === 8)
                            Agustus
                        @elseif ($item->month_real === 9)
                            September
                        @elseif ($item->month_real === 10)
                            Oktober
                        @elseif ($item->month_real === 11)
                            November
                        @elseif ($item->month_real === 12)
                            Desember
                        @endif
                    </td>
                    <td>{{ $item->week_real }}</td>
                    <td>{{ $item->keterangan }}</td>
                    @if ($item->image_path)
                        <td><a href="{{ asset('img/uploads/' . $item->image_path) }}">Link</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        <a href="{{ route('perawatan.lapor', $item->preventive_maintenance_id) }}" class="btn btn-primary">Lapor</a>
                        <a href="{{ route('perawatan.edit', $item->preventive_maintenance_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('perawatan.destroy', $item->preventive_maintenance_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="perawatan/create/1/2020" class="btn btn-primary mt-3 mb-5">Add Preventive Maintenance</a>
    </div>
@endsection
