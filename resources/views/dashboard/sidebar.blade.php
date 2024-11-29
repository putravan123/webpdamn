<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <span class="app-brand-logo demo">
      <img src="{{asset('image/pdam-garut.png')}}" alt="" style="width: 80px">
    </span>
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-text menu-text fw-bold ms-2">PDAM GARUT</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item active">
      <a href="{{route('dashboard')}}" class="menu-link" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div class="text-truncate">Dashboard</div>
      </a>
    </li>
    
    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate">User Management</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('users.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Users</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('roles.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Jenis User</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-group"></i>
        <div class="text-truncate">Data Karyawan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('jabatans.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Jabatan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('karyawans.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Karyawan</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Tampilan Web</span>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-slideshow"></i>
        <div class="text-truncate">Beranda</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('slides.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Create/Edit/Delete</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('Tampilan')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Tampilan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('abouts.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Patner Kami</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div class="text-truncate">Berita</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('blogs.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Tampilan</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-image"></i>
        <div class="text-truncate">Galeri</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('team.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Image</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-info-circle"></i>
        <div class="text-truncate">Profile Kami</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('biografi.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Biografi Direksi</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('tentang-pdams.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Tentang PDAM</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('visi_misis.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Visi Misi</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('strukturs.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Struktur</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('core-value.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Core Value</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('peta_wilayahs.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Peta Wilayah</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('kapasitas-produk.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Kapasitas Produk</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('sambungan_langganans.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Sambungan Langganan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('hukum.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Produk Hukum</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-clipboard"></i>
        <div class="text-truncate">Aspek</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('pelayanans.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Aspek Pelayanan</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('tekniss.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Aspek Teknis</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('manajemen.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Aspek Manajemen</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('keuangan.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Aspek Keuangan</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pelayanan</span>
    </li>    
    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div class="text-truncate">Pelayanan Langganan</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('registrasis.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Laporan Registrasi</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item">
      <a href="" class="menu-link menu-toggle" style="text-decoration: none">
        <i class="menu-icon tf-icons bx bx-mail-send"></i>
        <div class="text-truncate">Kontak</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{route('contacts.index')}}" class="menu-link" style="text-decoration: none">
            <div class="text-truncate">Pesan</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
