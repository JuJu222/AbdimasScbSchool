@extends('layout.main_layout')

@section('main_content')
    
<style>
    body::before{
    display: block;
    content: '';
    height: 60px;
}
</style>
   

  
    <div class="container">
       
        <form action="{{ route('perawatan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Jenis Project</label>
                <select name="project_id" class="form-select">
                    @foreach($projects as $item)
                        <option value="{{ $item->project_id }}">{{ $item->jenis_project }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="year" min="2020" max="9999" step="1" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Bulan</label>
                <select name="month" class="form-select">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <label>Minggu</label>
                <select name="week" class="form-select">
                    <option value="1">Minggu 1</option>
                    <option value="2">Minggu 2</option>
                    <option value="3">Minggu 3</option>
                    <option value="4">Minggu 4</option>
                </select>
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
@endsection
