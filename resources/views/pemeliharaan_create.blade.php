@extends('layout.main_layout')

@section('main_content')
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
                <select name="equipment_id" class="form-select" id="equipment_id">
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
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label>Biaya</label>
                <input type="text" name="biaya" class="form-control">
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <select name="year" class="form-select" id="year">
                    @for ($i = 2020; $i < 2030; $i++)
                        @if ($i == $year)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
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
                                    @if ($item->month_plan . '_' . $item->week_plan == $i . '_' . $j)
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
    <script>
        $('#equipment_id, #year').on('change', function (e) {
            let equipment_id = $("#equipment_id").val();
            let year = $("#year").val();

            location.href = '/pemeliharaan/create/' + equipment_id + '/' + year;
        });
    </script>
@endsection
