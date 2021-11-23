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
        <h1><b>Equipments</b></h1>
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
                <th data-field="nama_equipment" data-sortable="true">Nama Equipment</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($equipments as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->nama_equipment }}</td>
                    <td>
                        <a href="{{ route('equipments.edit', $item->equipment_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('equipments.destroy', $item->equipment_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('equipments.create') }}" class="btn btn-primary mt-3 mb-5">Add Equipment</a>
    </div>
@endsection
