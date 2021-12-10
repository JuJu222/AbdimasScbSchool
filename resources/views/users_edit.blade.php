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
        <h1><b>Edit School</b></h1>
    </div>
    <div class="container mt-5 mb-5">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label><h4><b>Nama</b></h4></label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Email</b></h4></label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Password Baru</b></h4></label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label class="mt-3"><h4><b>Role</b></h4></label>
                <select name="role" class="form-select" id="role">
                    @if ($user->role == 'admin')
                        <option value="admin" selected>Admin</option>
                    @else
                        <option value="admin">Admin</option>
                    @endif
                    @if ($user->role == 'user')
                        <option value="user" selected>User</option>
                    @else
                        <option value="user">User</option>
                    @endif
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
