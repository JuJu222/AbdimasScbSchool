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
        <form action="{{ route('pemeliharaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Equipment</label>
                <select name="equipment_id" class="form-select">
                    @foreach($equipments as $item)
                        <option value="{{ $item->equipment_id }}">{{ $item->nama_equipment }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <select name="year" class="form-select">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <div>
                    <label>Januari</label>
                    <div class="form-check form-check-inline">
                        <label>Minggu 1</label>
                        <input name="1_1" class="form-check-input" type="checkbox" value="1">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 2</label>
                        <input name="1_2" class="form-check-input" type="checkbox" value="2">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 3</label>
                        <input name="1_3" class="form-check-input" type="checkbox" value="3">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 4</label>
                        <input name="1_4" class="form-check-input" type="checkbox" value="4">
                    </div>
                </div>
                <div>
                    <label>Februari</label>
                    <div class="form-check form-check-inline">
                        <label>Minggu 1</label>
                        <input name="2_1" class="form-check-input" type="checkbox" value="1">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 2</label>
                        <input name="2_2" class="form-check-input" type="checkbox" value="2">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 3</label>
                        <input name="2_3" class="form-check-input" type="checkbox" value="3">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 4</label>
                        <input name="2_4" class="form-check-input" type="checkbox" value="4">
                    </div>
                </div>
                <div>
                    <label>Maret</label>
                    <div class="form-check form-check-inline">
                        <label>Minggu 1</label>
                        <input name="3_1" class="form-check-input" type="checkbox" value="1">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 2</label>
                        <input name="3_2" class="form-check-input" type="checkbox" value="2">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 3</label>
                        <input name="3_3" class="form-check-input" type="checkbox" value="3">
                    </div>
                    <div class="form-check form-check-inline">
                        <label>Minggu 4</label>
                        <input name="3_4" class="form-check-input" type="checkbox" value="4">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
