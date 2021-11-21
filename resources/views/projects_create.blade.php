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
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Jenis Project</label>
                <input type="text" name="jenis_project" class="form-control">
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
