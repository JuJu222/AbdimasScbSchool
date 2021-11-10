<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Maintenance - SCB Surabaya</title>
</head>
<body>
    @include('layout.navigation_layout')
    <div class="bg-dark" style="height:300px">
        <div class="container text-white">
            <h1 class="pt-5 text-center">Maintenance</h1>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Jenis Project</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Minggu</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($currativeMaintenances as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->project->jenis_project }}</td>
                    <td>{{ $item->year }}</td>
                    <td>{{ $item->month }}</td>
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
        </table>
        <a href="{{ route('perawatan.create') }}" class="btn btn-primary mt-3 mb-5">Add Preventive Maintenance</a>
    </div>
</body>
</html>
