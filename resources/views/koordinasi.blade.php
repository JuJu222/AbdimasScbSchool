@extends('layout.main_layout')

@section('main_content')

    @include('layout.header')
    <div class="container mt-5 mb-5">
        <h1><b>Jadwal Koordinasi</b></h1>
    </div>

    <div class="container mt-3">
        <div id="toolbar">
            @if (auth()->user()->role == 'admin')
                <button id="remove" class="btn btn-danger" disabled>Delete</button>
            @endif
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
                <th data-field="coordination_id" data-visible="false">coordination_id</th>
                <th data-field="date_time" data-sortable="true">Date Time</th>
                <th data-field="tema_koordinasi" data-filter-control="select" data-sortable="true">Tema Koordinasi</th>
                <th data-field="link_zoom">Link Zoom</th>
                <th data-field="meeting_id">Meeting ID</th>
                <th data-field="meeting_passcode">Meeting Passcode</th>
                <th data-field="keterangan">Keterangan</th>
                <th data-field="image">Image</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($coordinations as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->coordination_id }}</td>
                    <td>{{ $item->date_time }}</td>
                    <td>{{ $item->tema_koordinasi }}</td>
                    <td><a target="_blank" rel="noopener noreferrer" href="{{ $item->link_zoom }}">{{ $item->link_zoom }}</a></td>
                    <td>{{ $item->meeting_id }}</td>
                    <td>{{ $item->meeting_passcode }}</td>
                    <td>{{ $item->keterangan }}</td>
                    @if ($item->image_path)
                        <td><a target="_blank" rel="noopener noreferrer" href="{{ asset('img/uploads/' . $item->image_path) }}">Link</a></td>
                    @else
                        <td></td>
                    @endif
                    <td>
                        <a href="{{ route('koordinasi.lapor', $item->coordination_id) }}" class="btn btn-primary">Lapor</a>
                        @if (auth()->user()->role == 'admin')
                            <a href="{{ route('koordinasi.edit', $item->coordination_id) }}" class="btn btn-warning">Edit</a>
                            <form class="d-inline" action="{{ route('koordinasi.destroy', $item->coordination_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('koordinasi.create') }}" class="btn btn-primary mt-3 mb-5">Tambah Koordinasi</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script>
        $table = $('#table')

        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function () {
                $('#remove').prop('disabled', !$table.bootstrapTable('getSelections').length)
            })


        $('#remove').click(function () {
            var ids = $table.bootstrapTable('getSelections')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: 'post',
                url: 'koordinasi/deleteMany',
                dataType: 'json',
                data: {message:ids},
                success: function (data) {
                    location.href = '/koordinasi'
                }
            });

            $('#remove').prop('disabled', true)
            $("#var2").act
        })
    </script>
@endsection
