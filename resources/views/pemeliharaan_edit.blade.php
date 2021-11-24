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
        <h1><b>Lapor Pemeliharaan</b></h1>
    </div>


    <div class="container mt-3">
        <form action="{{ route('pemeliharaan.laporStore', $preventiveMaintenance->preventive_maintenance_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label><h4><b>Nama Equipment</b></h4></label>
                <select name="equipment_id" class="form-select" id="equipment_id">
                    @foreach($equipments as $item)
                        @if ($item->equipment_id == $preventiveMaintenance->equipment->equipment_id)
                            <option value="{{ $item->equipment_id }}" selected>{{ $item->nama_equipment }}</option>
                        @else
                            <option value="{{ $item->equipment_id }}">{{ $item->nama_equipment }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Quantity</b></h4></label>
                <input type="number" name="quantity" class="form-control" value="{{ $preventiveMaintenance->quantity }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Biaya</b></h4></label>
                <input type="text" name="biaya" class="form-control" value="{{ $preventiveMaintenance->biaya }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun Perencanaan</b></h4></label>
                <select name="year" class="form-select" id="year">
                    @for ($i = 2020; $i < 2030; $i++)
                        @if ($i == $preventiveMaintenance->year_plan)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan Perencanaan</b></h4></label>
                <select name="month_real" class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">@if ($i === 1)
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
                            @endif</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Minggu Perencanaan</b></h4></label>
                <select name="week_real" class="form-select">
                    @for ($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun Realisasi</b></h4></label>
                <select name="year_real" class="form-select">
                    @for ($i = 2020; $i < 2030; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan Realisasi</b></h4></label>
                <select name="month_real" class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">@if ($i === 1)
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
                            @endif</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Minggu Realisasi</b></h4></label>
                <select name="week_real" class="form-select">
                    @for ($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Image</b></h4></label>
                <input class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
