    <!-- Navbar --> 
    <nav class="navbar shadow navbar-expand-lg navbar-light ">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="fa-solid fa-spray-can"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link @if($title=='home') active @else '' @endif" aria-current="page" href="/">Home</a>
            <a class="nav-link @if($title=='berita') active @else '' @endif" href="/berita">Berita</a>
            @if(auth()->user())
            @else
            <a class="nav-link @if($title=='cari-perbaikan') active @else '' @endif" href="/search-progres">Cari Perbaikan</a>
            @endif
          </div>
          @auth
          @if(auth()->user()->role =="admin")
          <li class="nav-item d-flex dropdown ms-auto me-3 dropdownprofil">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }} 
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="/profil"><i class="fa-solid fa-address-card me-3"></i>Profil </a></li>
              <li><a class="dropdown-item" href="/manage-menu"><i class="bi bi-gear-fill me-3"></i>Kelola </a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirm-logout"><i class="fa-solid fa-right-from-bracket me-3"></i>
                  Logout
                </button>
              </li>
            </ul>
          </li>
          @elseif(auth()->user()->role == "user")
          <li class="nav-item d-flex dropdown ms-auto me-3 dropdownprofil">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="/profil"><i class="fa-solid fa-address-card me-3"></i>Profil </a></li>
              <li><a class="dropdown-item" href="/my-vehicle/{{ auth()->user()->id }}/{{ auth()->user()->nik }}"><img src="/icon/sports-car.png" alt="" style="width: 25px; margin-left: -3px; margin-right: 11px;">History Transaksi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirm-logout"><i class="fa-solid fa-right-from-bracket me-3"></i>
                  Logout
                </button>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item d-flex dropdown ms-auto me-3 dropdownprofil">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="/profil"><i class="fa-solid fa-address-card me-3"></i>Profil </a></li>
              <li><a class="dropdown-item" href="/garage-report"><i class="bi bi-file-text-fill me-3"></i>Laporan Bengkel</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirm-logout"><i class="fa-solid fa-right-from-bracket me-3"></i>
                  Logout
                </button>
              </li>
            </ul>
          </li>
          @endif
          @else
          <div class="navbar-nav d-flex ms-auto">
            <a class="nav-link" href="/login">Login</a>
          </div>
          @endauth
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Modal Logout-->
    <div class="modal fade" id="confirm-logout"  data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin untuk keluar ?</p>
          </div>
          <div class="modal-footer">
            <form action="/logout" method="post" onkeydown="return event.key != 'Enter';">
              @csrf
              <button type="button" class="btn btn-secondary logout-btn-cancel" data-bs-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-warning logout-btn">Ya</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- Akhir Modal Logout -->