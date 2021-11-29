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
        <h1><b>Edit Equipments</b></h1>
    </div>
    <div class="container mt-5 mb-5">
        <form action="{{ route('equipments.update', $equipment->equipment_id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label>Nama Equipment</label>
                <input type="text" name="nama_equipment" class="form-control" value="{{ $equipment->nama_equipment }}">
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
