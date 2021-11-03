<nav class="navbar navbar-expand-lg navbar-dark bg-blue">
        <div class="container-fluid">
          <a class="navbar-brand " href="#">
            <img src="img/scb_logo.png" alt="" width="238" height="37">Sekolah Citra Berkat Surabaya</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-link 
              @if ($title =='home') active @endif" href="/">Home</a>
              
              <a class="nav-link
              @if ($title =='maintenance') active @endif" href="/maintenance">Maintenance</a>
              
              <a class="nav-link
              @if ($title =='laporan') active @endif" href="/laporan">Laporan</a>

              <a class="nav-link
              @if ($title =='jadwal_koordinasi') active @endif" href="/koordinasi">Jadwal Koordinasi</a>
            </div>
          </div>
        </div>
</nav>

  
