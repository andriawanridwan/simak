 <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link active" href="{{url('/')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
               <li class="menu-header">Akademik</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Akademik</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Jadwal Kuliah</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Kartu Hasil Studi</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Kartu Rencana Studi</a></li>
                  <li><a class="nav-link" href="{{route('matkul.index')}}">Mata Kuliah</a></li>
                   <li><a class="nav-link" href="{{route('registrasi.index')}}">Register</a></li>
                  <li><a class="nav-link" href="{{route('tahunakademik.index')}}">Tahun Akademik</a></li>
                </ul>
              </li>
              <li class="menu-header">Data Master</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('dosen.index')}}">Dosen</a></li>
                  <li><a class="nav-link" href="{{route('konsentrasi.index')}}">Konsentrasi</a></li>
                  <li><a class="nav-link" href="{{route('prodi.index')}}">Prodi</a></li>
                  <li><a class="nav-link" href="{{route('ruangan.index')}}">Ruangan</a></li>
                  <li><a class="nav-link" href="{{route('tahunangkatan.index')}}">Tahun Angkatan</a></li>
                </ul>
              </li>
              <li class="menu-header">Mahasiswa</li>
              <li><a class="nav-link active" href="{{ route('mahasiswa.index') }}"><i class="fas fa-fire"></i> <span>Mahasiswa</span></a></li>
            
        </aside>
      </div>