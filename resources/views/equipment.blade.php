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
                <th>Nama Equipment</th>
                <th>Quantity</th>
                <th>Biaya</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
            @foreach ($equipments as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->nama_equipment }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->keterangan }}</td>
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
        </table>
        <a href="{{ route('equipments.create') }}" class="btn btn-primary mt-3 mb-5">Add Equipment</a>
    </div>
</body>
</html>
