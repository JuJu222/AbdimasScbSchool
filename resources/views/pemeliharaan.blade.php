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
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Minggu</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($preventiveMaintenances as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->equipment->nama_equipment }}</td>
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
                        <a href="{{ route('pemeliharaan.edit', $item->preventive_maintenance_id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" action="{{ route('pemeliharaan.destroy', $item->preventive_maintenance_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="pemeliharaan/create/1" class="btn btn-primary mt-3 mb-5">Add Preventive Maintenance</a>
    </div>
</body>
</html>
