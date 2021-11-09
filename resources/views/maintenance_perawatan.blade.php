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
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama Equipment</th>
            <th>Quantity</th>
            <th>Biaya</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($currativeMaintenances as $item)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $item->project->biaya }}</td>
                {{--                <td>{{ $item['project'] }}</td>--}}
                {{--                <td>{{ $item['semester'] }}</td>--}}
                {{--                <td><a href="{{ route('courses.show', $item->course->code) }}">{{ $item->course->name }}</a></td>--}}
                {{--                <td>{{ $item['description'] }}</td>--}}
                {{--                <td>--}}
                {{--                    <a href="{{ route('projects.show', $item['code']) }}" class="btn btn-primary">Show</a>--}}
                {{--                    <a href="{{ route('projects.edit', $item['id']) }}" class="btn btn-warning">Edit</a>--}}
                {{--                    <form action="{{ route('projects.destroy', $item['id']) }}" method="POST">--}}
                {{--                        @csrf--}}
                {{--                        @method('DELETE')--}}
                {{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
                {{--                    </form>--}}
                {{--                </td>--}}
            </tr>
        @endforeach
    </table>
</body>
</html>
