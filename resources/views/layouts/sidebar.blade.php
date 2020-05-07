 <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SIMAK</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SK</a>
          </div>
          <ul class="sidebar-menu">
            @if(Auth::user()->level == 'Admin')
              <li class="menu-header">Dashboard</li>
              <li class="{{Request::segment(1) == '' ? 'active' : ''}}"><a class="nav-link active" href="{{url('/')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
               <li class="menu-header">Akademik</li>
              <li class="nav-item dropdown  {{Request::segment(1) == 'jadwal' || Request::segment(1) == 'khs' || Request::segment(1) == 'krs' ||
                Request::segment(1) == 'matkul' || Request::segment(1) == 'registrasi' || Request::segment(1) == 'tahunakademik' ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Akademik</span></a>
                <ul class="dropdown-menu ">
                  <li class="{{Request::segment(1) == 'jadwal' ? 'active' : ''}}"><a class="nav-link" href="{{route('jadwal.index')}}">Jadwal Kuliah</a></li>
                  <li class="{{Request::segment(1) == 'khs' ? 'active' : ''}}"><a class="nav-link" href="{{route('khs.index')}}">Kartu Hasil Studi</a></li>
                  <li class="{{Request::segment(1) == 'krs' ? 'active' : ''}}"><a class="nav-link" href="{{route('krs.index')}}">Kartu Rencana Studi</a></li>
                  <li class="{{Request::segment(1) == 'matkul' ? 'active' : ''}}"><a class="nav-link" href="{{route('matkul.index')}}">Mata Kuliah</a></li>
                  <li class="{{Request::segment(1) == 'registrasi' ? 'active' : ''}}"><a class="nav-link" href="{{route('registrasi.index')}}">Register</a></li>
                  <li class="{{Request::segment(1) == 'tahunakademik' ? 'active' : ''}}"><a class="nav-link" href="{{route('tahunakademik.index')}}">Tahun Akademik</a></li>
                </ul>
              </li>
              <li class="menu-header">Data Master</li>
              <li class="nav-item dropdown {{Request::segment(1) == 'dosen' || Request::segment(1) == 'konsentrasi' ||  Request::segment(1) == 'prodi' ||
              Request::segment(1) == 'ruangan' || Request::segment(1) == 'tahunangkatan' ? 'active' : ''}} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li class="{{Request::segment(1) == 'dosen' ? 'active' : ''}}"><a class="nav-link" href="{{route('dosen.index')}}">Dosen</a></li>
                  <li class="{{Request::segment(1) == 'konsentrasi' ? 'active' : ''}}"><a class="nav-link" href="{{route('konsentrasi.index')}}">Konsentrasi</a></li>
                  <li class="{{Request::segment(1) == 'prodi' ? 'active' : ''}}"><a class="nav-link" href="{{route('prodi.index')}}">Prodi</a></li>
                  <li class="{{Request::segment(1) == 'ruangan' ? 'active' : ''}}"><a class="nav-link" href="{{route('ruangan.index')}}">Ruangan</a></li>
                  <li class="{{Request::segment(1) == 'tahunangkatan' ? 'active' : ''}}"><a class="nav-link" href="{{route('tahunangkatan.index')}}">Tahun Angkatan</a></li>
                </ul>
              </li>
              <li class="menu-header">Mahasiswa</li>
              <li class="{{Request::segment(1) == 'mahasiswa' ? 'active' : ''}}"><a class="nav-link" href="{{ route('mahasiswa.index') }}"><i class="fas fa-users"></i> <span>Mahasiswa</span></a></li>
               <li class="menu-header">Pengguna</li>
              <li class="{{Request::segment(1) == 'pengguna' ? 'active' : ''}}"><a class="nav-link" href="{{ route('pengguna.index') }}"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
              @elseif(Auth::user()->level == 'Dosen')
                 <li class="menu-header">Biodata</li>
                 <li class="{{Request::segment(1) == 'biodata' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('biodata.index') }}"><i class="fas fa-user"></i> <span>Biodata</span></a></li>
                 <li class="menu-header">Jadwal Mengajar</li>
                 <li class="{{Request::segment(1) == 'lihatjadwal' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('lihatjadwal') }}"><i class="fas fa-calendar-alt"></i> <span>Jadwal Mengajar</span></a></li>
                  <li class="menu-header">Nilai</li>
                 <li class="{{Request::segment(1) == 'nilai' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('nilai.index') }}"><i class="fas fa-book"></i> <span>Nilai</span></a></li>
              @elseif(Auth::user()->level == 'Mahasiswa')
                 <li class="menu-header">Biodata</li>
                 <li class="{{Request::segment(1) == 'biodata' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('biodata.index') }}"><i class="fas fa-user"></i> <span>Biodata</span></a></li>
                  <li class="menu-header">Jadwal Kuliah</li>
                 <li class="{{Request::segment(1) == 'jadwalkuliah' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('jadwalkuliah') }}"><i class="fas fa-calendar-alt"></i> <span>Jadwal Kuliah</span></a></li>
                  <li class="menu-header">Kartu Hasil Studi</li>
                 <li class="{{Request::segment(1) == 'khsmahasiswa' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('khsmahasiswa') }}"><i class="fas fa-book"></i> <span>Kartu Hasil Studi</span></a></li>
                  <li class="menu-header">Kartu Rencana Studi</li>
                 <li class="{{Request::segment(1) == 'krsmahasiswa' ? 'active' : ''}}"><a class="nav-link active" href="{{ route('krsmahasiswa') }}"><i class="fas fa-book"></i> <span>Kartu Rencana Studi</span></a></li>
              @endif
            </ul>
        </aside>
      </div>