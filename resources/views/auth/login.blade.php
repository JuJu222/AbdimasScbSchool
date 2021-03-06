@extends('layout.main_layout')

@section('main_content')

<style>
    section{
        height: 100vh;
        background: #0062E6 !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .card{
        overflow: hidden;
        border: 0 !important;
        border-radius: 20px !important;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .img-left{
        width: 45%;
        background: url('img/front_gedung.jpeg') center;
        background-size: cover;
    }

    .card-body{
        padding: 2rem;
    }

    .title{
        margin-bottom: 2rem;
    }
    .form-input{
        position: relative;
    }

    .form-input input{
        width: 100%;
        height: 45px;
        padding-left: 40px;
        margin-bottom: 20px;
        box-sizing: border-box;
        box-shadow: none;
        border: 1px solid #00000020;
        border-radius: 50px;
        outline: none;
        background: transparent;
    }

    .form-input span{
        position: absolute;
        top: 10px;
        padding-left: 15px;
        color: #007bff;
    }

    .form-input input::placeholder{
        color: black;
        padding-left: 0px;
    }

    .form-input input:focus, .form-input input:valid{
        border: 2px solid #007bff;
    }

    .form-input input:focus::placeholder{
        color: #454b69;
    }

    .custom-checkbox .custom-control-input:checked  .custom-control-label::before{
        background-color: #007bff !important;
        border: 0px;
    }

    .form-box button[type="submit"]{
        margin-top: 10px;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 50px;
        background: #007bff;
        color: #fff;
        font-size: 90%;
        letter-spacing: .1rem;
        transition: 0.5s;
        padding: 12px;
    }

    .form-box button[type='submit']:hover{
        background: #0069d9;
    }

    .forget-link:hover, .register-link:hover{
        color: #0069d9;
        text-decoration: none;
    }
    .form-box {
        text-decoration: none;
    }

    .custom-control-label{
        text-decoration: none;
    }


</style>
    <section>
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                    <div class="img-left d-none d-md-flex"></div>
                    <div class="card-body">
                        <h4 class="title text-center mt-4">
                            Login
                        </h4>
                        <form method="POST" action="{{ route('login') }}" class="form-box px-3">
                            @csrf
                            <div class="form-input">
                                <span><i class="bi bi-envelope"></i></span>
                                <input id="email" placeholder="Email Address" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-input">
                                <span><i class="bi bi-key"></i></span>
                                <input id="password" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-default text-uppercase ">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            {{-- <div class="text-center">
                                <a href="#" class="forget-link">Forget Password?</a>
                            </div> --}}

                            <div class="text-center mb-2">
                                Belum punya akun?
                                <a href="/register" class="register-link">
                                    Registrasi Disini!
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>


@endsection
