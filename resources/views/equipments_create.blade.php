@extends('layout.main_layout')

@section('main_content')
<style>
    body::before{
    display: block;
    content: '';
    height: 60px;
}
</style>
   



    <div class="container mt-5 mb-5">
        <form action="{{ route('equipments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Equipment</label>
                <input type="text" name="nama_equipment" class="form-control">
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
