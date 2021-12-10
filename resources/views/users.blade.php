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
        <h1><b>Users</b></h1>
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
                <th data-field="id" data-visible="false">id</th>
                <th data-field="name" data-sortable="true">Nama</th>
                <th data-field="email" data-sortable="true">Email</th>
                <th data-field="role" data-sortable="true">Role</th>
                <th data-field="created_at" data-sortable="true">Dibuat pada</th>
                @if (auth()->user()->role == 'admin')
                    <th data-field="actions">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->created_at }}</td>
                    @if (auth()->user()->role == 'admin')
                        <td>
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form class="d-inline" action="{{ route('users.destroy', $item->id) }}" method="POST">
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
            url: 'users/deleteMany',
            dataType: 'json',
            data: {message:ids},
            success: function (data) {
                location.href = '/users'
            }
        });

        $('#remove').prop('disabled', true)
        $("#var2").act
    })
</script>
@endsection
