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
        <h1><b>Tambah Status Pemeliharaan</b></h1>
    </div>


    <div class="container mt-5" >
        <form action="{{ route('pemeliharaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label><h4><b>Nama Sekolah</b></h4></label>
                <select name="school_id" class="form-select" id="school_id">
                    @foreach($schools as $item)
                        @if ($item->school_id == $school_id)
                            <option value="{{ $item->school_id }}" selected>{{ $item->nama_sekolah }}</option>
                        @else
                            <option value="{{ $item->school_id }}">{{ $item->nama_sekolah }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun</b></h4></label>
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
                <label class="mt-3"><h4><b>Nama Equipment</b></h4></label>
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
                <label class="mt-3"><h4><b>Quantity</b></h4></label>
                <input type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Biaya</b></h4></label>
                <input type="text" name="biaya" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan</b></h4></label>
                <div class="mb-2"><mark>* Bila pemeliharaan mencangkup minggu kelima di bulan tertentu maka akan dianggap sebagai minggu pertama dari bulan berikutnya.</mark></div>
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
            <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
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
        $('#school_id, #equipment_id, #year').on('change', function (e) {
            let school_id = $("#school_id").val();
            let equipment_id = $("#equipment_id").val();
            let year = $("#year").val();

            location.href = '/pemeliharaan/create/' + school_id + '/' + year + '/' + equipment_id;
        });
    </script>
@endsection
