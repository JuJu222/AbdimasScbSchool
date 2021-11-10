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
                <select name="equipment_id" class="form-select" onchange="top.location.href = this.options[this.selectedIndex].value">
                    @foreach($equipments as $item)
                        @if ($item->equipment_id == $equipment_id)
                            <option value="{{ $item->equipment_id }}" selected>{{ $item->nama_equipment }}</option>
                        @else
                            <option value="{{ $item->equipment_id }}">{{ $item->nama_equipment }}</option>
                        @endif
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
                @for ($i = 1; $i <= 12; $i++)
                    <div>
                        <label>
                            @if ($i === 1)
                                Januari
                            @elseif ($i === 2)
                                Februari
                            @elseif ($i === 3)
                                Maret
                            @elseif ($i === 4)
                                April
                            @elseif ($i === 5)
                                Mei
                            @elseif ($i === 6)
                                Juni
                            @elseif ($i === 7)
                                Juli
                            @elseif ($i === 8)
                                Agustus
                            @elseif ($i === 9)
                                September
                            @elseif ($i === 10)
                                Oktober
                            @elseif ($i === 11)
                                November
                            @elseif ($i === 12)
                                Desember
                            @endif
                        </label>
                        @for ($j = 1; $j <= 4; $j++)
                            <div class="form-check form-check-inline">
                                <label>Minggu {{ $j }}</label>
                                <input name="{{ $i . '_' .$j }}" class="form-check-input" type="checkbox" value="{{ $j }}"
                                @foreach ($preventiveMaintenances as $item)
                                    @if ($item->month . '_' . $item->week == $i . '_' . $j)
                                        checked disabled
                                    @endif
                                @endforeach
                                >
                            </div>
                        @endfor
                    </div>
                @endfor
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
