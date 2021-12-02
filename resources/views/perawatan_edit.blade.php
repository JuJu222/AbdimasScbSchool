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
        <h1><b>Edit Perawatan</b></h1>
    </div>


    <div class="container mt-3">
        <form action="{{ route('perawatan.update', $currativeMaintenance->currative_maintenance_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label><h4><b>Nama Sekolah</b></h4></label>
                <select name="school_id" class="form-select" id="school_id">
                    @foreach($schools as $item)
                        @if ($item->school_id == $currativeMaintenance->school->school_id)
                            <option value="{{ $item->school_id }}" selected>{{ $item->nama_sekolah }}</option>
                        @else
                            <option value="{{ $item->school_id }}">{{ $item->nama_sekolah }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Jenis Project</b></h4></label>
                <select name="project_id" class="form-select" id="project_id">
                    @foreach($projects as $item)
                        @if ($item->project_id == $currativeMaintenance->project->project_id)
                            <option value="{{ $item->project_id }}" selected>{{ $item->jenis_project }}</option>
                        @else
                            <option value="{{ $item->project_id }}">{{ $item->jenis_project }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Quantity</b></h4></label>
                <input type="number" name="quantity" class="form-control" value="{{ $currativeMaintenance->quantity }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Biaya</b></h4></label>
                <input type="text" name="biaya" class="form-control" value="{{ $currativeMaintenance->biaya }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun Perencanaan</b></h4></label>
                <select name="year_plan" class="form-select" id="year_plan">
                    @for ($i = 2020; $i < 2030; $i++)
                        @if ($i == $currativeMaintenance->year_plan)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan Perencanaan</b></h4></label>
                <select name="month_plan" class="form-select">
                    @for ($i = 1; $i <= 12; $i++)
                        @if ($i == $currativeMaintenance->month_plan)
                            <option selected value="{{ $i }}">@if ($i === 1)
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
                        @else
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
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Minggu Perencanaan</b></h4></label>
                <select name="week_plan" class="form-select">
                    @for ($i = 1; $i <= 4; $i++)
                        @if ($i == $currativeMaintenance->week_plan)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun Realisasi</b></h4></label>
                <select name="year_real" class="form-select">
                    <option value="" selected></option>
                    @for ($i = 2020; $i < 2030; $i++)
                        @if ($i == $currativeMaintenance->year_real)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan Realisasi</b></h4></label>
                <select name="month_real" class="form-select">
                    <option value="" selected></option>
                    @for ($i = 1; $i <= 12; $i++)
                        @if ($i == $currativeMaintenance->month_real)
                            <option selected value="{{ $i }}">@if ($i === 1)
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
                        @else
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
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Minggu Realisasi</b></h4></label>
                <select name="week_real" class="form-select">
                    <option value="" selected></option>
                    @for ($i = 1; $i <= 4; $i++)
                        @if ($i == $currativeMaintenance->week_real)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Status</b></h4></label>
                <select name="status" class="form-select" id="status">
                    @if ($currativeMaintenance->status == 'Belum')
                        <option value="Belum" selected>Belum</option>
                    @else
                        <option value="Belum">Belum</option>
                    @endif
                    @if ($currativeMaintenance->status == 'Selesai')
                        <option value="Selesai" selected>Selesai</option>
                    @else
                        <option value="Selesai">Selesai</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Keterangan</b></h4></label>
                <input type="text" name="keterangan" class="form-control" value="{{ $currativeMaintenance->keterangan }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Image</b></h4></label>
                @if ($currativeMaintenance->image_path)
                    <div>
                        <a target="_blank" rel="noopener noreferrer" href="{{ asset('img/uploads/' . $currativeMaintenance->image_path) }}">Image Link</a>
                    </div>
                @endif
                <input class="form-control mt-3" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
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
