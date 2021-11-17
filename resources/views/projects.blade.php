@extends('layout.main_layout')

@section('main_content')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Maintenance</h1>
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
                <th data-field="jenis_project" data-sortable="true">Jenis Project</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->jenis_project }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $item->project_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('projects.destroy', $item->project_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('projects.create') }}" class="btn btn-primary mt-3 mb-5">Add Project</a>
    </div>
@endsection
