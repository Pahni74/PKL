<!-- Sidebar user panel (optional) -->
{{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div> --}}

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link">
                <i class="fas fa-home"></i>
                <p> Dashboard</p>
            </a>
        </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
            Provinsi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('provinsi.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Provinsi</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-city"></i>
            <p>
            Kabupaten / Kota
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('kota.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Kabupaten / Kota</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="far fa-building"></i>
            <p>
            Kecamatan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route("kecamatan.index") }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Kecamatan</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
            Kelurahan / Desa
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('kelurahan.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Kelurahan / Desa</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
             Rukun Warga
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('rw.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Rukun Warga</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route("tracking.index") }}">
            <i class="fas fa-briefcase"></i>
            <p>Tracking</p>
        </a>
      </li>
      {{-- <li class="nav-header"><strong>UTILITIES</strong></li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-cog"></i>
                <p> Costumize AdminLTE</p>
            </a>
          </li> --}}
    </ul>
  </nav>
