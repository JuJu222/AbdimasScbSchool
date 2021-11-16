<nav class="navbar navbar-expand-lg navbar-light navbar-inverse bg-light py-3 fixed-top">
        <div class="container">
          <a class="navbar-brand " href="#">
            <img src="img/scb_logo.png" alt="" width="238" height="37"></a>
          {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
            <ul class="nav navbar-nav nav-pills navbar-right text-light ">
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
                <a class="btn btn-warning text fw-bold" href="/login">LOGIN</a>
                </li>

              <li class="nav-item">
                <a class="btn btn-danger" href="/register">REGISTER</a>
              </li>
            </ul>
          
        </div>
</nav>

  
