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
        <h1><b>Projects</b></h1>
    </div>

    <div class="container mt-3">
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-en-US.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

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
                <th data-field="project_id" data-visible="false">project_id</th>
                <th data-field="jenis_project" data-sortable="true">Jenis project</th>
                @if (auth()->user()->role == 'admin')
                    <th data-field="actions">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->project_id }}</td>
                    <td>{{ $item->jenis_project }}</td>
                    @if (auth()->user()->role == 'admin')
                        <td>
                            <a href="{{ route('projects.edit', $item->project_id) }}" class="btn btn-warning">Edit</a>
                            <form class="d-inline" action="{{ route('projects.destroy', $item->project_id) }}" method="POST">
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
        <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3 mb-5">Add Project</a>
    </div>
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
            url: 'projects/deleteMany',
            dataType: 'json',
            data: {message:ids},
            success: function (data) {
                location.href = '/projects'
            }
        });

        $('#remove').prop('disabled', true)
        $("#var2").act
    })
</script>
@endsection
