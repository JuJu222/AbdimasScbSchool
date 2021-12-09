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
        <h1><b>Schools</b></h1>
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
                <th data-field="school_id" data-visible="false">school_id</th>
                <th data-field="nama_sekolah" data-sortable="true">Nama Sekolah</th>
                @if (auth()->user()->role == 'admin')
                    <th data-field="actions">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($schools as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->school_id }}</td>
                    <td>{{ $item->nama_sekolah }}</td>
                    @if (auth()->user()->role == 'admin')
                        <td>
                            <a href="{{ route('schools.edit', $item->school_id) }}" class="btn btn-warning">Edit</a>
                            <form class="d-inline" action="{{ route('schools.destroy', $item->school_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('schools.create') }}" class="btn btn-primary mt-3 mb-5">Add School</a>
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
            url: 'schools/deleteMany',
            dataType: 'json',
            data: {message:ids},
            success: function (data) {
                location.href = '/schools'
            }
        });

        $('#remove').prop('disabled', true)
        $("#var2").act
    })
</script>
@endsection
