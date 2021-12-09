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
        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">

        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>

        <table id="table"
               data-toggle="table"
               data-minimum-count-columns="2"
               data-pagination="false"
               data-id-field="id"
               data-page-size="1"
               data-smart-display="true">
            <thead>
            <tr>
                <th data-field="nama_equipment">Nama Equipment</th>
                <th data-field="quantity">Quantity</th>
                <th data-field="biaya">Biaya</th>
                <th data-field="year_plan">Tahun Perencanaan</th>
                <th data-field="month_plan">Bulan Perencanaan</th>
                <th data-field="week_plan">Minggu Perencanaan</th>
                <th data-field="status">Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $preventiveMaintenance->equipment->nama_equipment }}</td>
                    <td>{{ $preventiveMaintenance->quantity }}</td>
                    <td>{{ $preventiveMaintenance->biaya }}</td>
                    <td>{{ $preventiveMaintenance->year_plan }}</td>
                    <td>
                        @if ($preventiveMaintenance->month_plan === 1)
                            Januari
                        @elseif ($preventiveMaintenance->month_plan === 2)
                            Februari
                        @elseif ($preventiveMaintenance->month_plan === 3)
                            Maret
                        @elseif ($preventiveMaintenance->month_plan === 4)
                            April
                        @elseif ($preventiveMaintenance->month_plan === 5)
                            Mei
                        @elseif ($preventiveMaintenance->month_plan === 6)
                            Juni
                        @elseif ($preventiveMaintenance->month_plan === 7)
                            Juli
                        @elseif ($preventiveMaintenance->month_plan === 8)
                            Agustus
                        @elseif ($preventiveMaintenance->month_plan === 9)
                            September
                        @elseif ($preventiveMaintenance->month_plan === 10)
                            Oktober
                        @elseif ($preventiveMaintenance->month_plan === 11)
                            November
                        @elseif ($preventiveMaintenance->month_plan === 12)
                            Desember
                        @endif
                    </td>
                    <td>{{ $preventiveMaintenance->week_plan }}</td>
                    <td>{{ $preventiveMaintenance->status }}</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('pemeliharaan.laporStore', $preventiveMaintenance->preventive_maintenance_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="mt-3"><h4><b>Tahun Realisasi</b></h4></label>
                <select name="year_real" class="form-select">
                    <option value="" selected></option>
                    @for ($i = 2020; $i < 2030; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Bulan Realisasi</b></h4></label>
                <select name="month_real" class="form-select">
                    <option value="" selected></option>
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
                    <option value="" selected></option>
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
                <label class="mt-3"><h4><b>Status</b></h4></label>
                <select name="status" class="form-select" id="status">
                    <option value="Belum" selected>Belum</option>
                    <option value="Pending">Pending</option>
                    <option value="Selesai">Selesai</option>
                </select>
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
