<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light navbar-inverse bg-light py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand " href="#">
            <img src="{{ asset('img/scb_logo.png') }}" alt="" width="238" height="37"></a>
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav text-light ">
            <li class="nav-item">
                <a class="nav-link
                @if ($title =='home') active @endif" href="/">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link
              @if ($title =='pemeliharaan') active @endif" href="/pemeliharaan">Pemeliharaan</a>
            </li>


            <li class="nav-item">
                <a class="nav-link
              @if ($title =='perawatan') active @endif" href="/perawatan">Perawatan</a>
            </li>

            <li class="nav-item">
                <a class="nav-link
              @if ($title =='jadwal_koordinasi') active @endif" href="/koordinasi">Jadwal Koordinasi</a>
            </li>

            <li class="nav-item">
                <a class="nav-link
                @if ($title =='list_video') active @endif" href="/video">Video</a>
            </li>
          </ul>
        </div>
        
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
            @auth()
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item col-6 col-md-auto">
                        <a class="nav-link
                     @if ($title =='sekolah') active @endif" href="/schools">Schools</a>
                    </li>
                    <li class="nav-item col-6 col-md-auto">
                        <a class="nav-link
                     @if ($title =='user') active @endif" href="/users">Users</a>
                    </li>
                @endif
            @endauth

            @guest()
                <li class="nav-item col-6 col-md-auto">
                    <a class="btn btn-warning text fw-bold" href="/login">LOGIN</a>
                </li>

                
                    <a class="btn btn-danger d-lg-inline-block my-2 my-md-0 ms-md-1" href="/register">REGISTER</a>
                
            @endguest
            @auth()
                <span class="navbar-text mx-4">Welcome, {{ auth()->user()->name }}</span>
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>

    </div>
</nav>


