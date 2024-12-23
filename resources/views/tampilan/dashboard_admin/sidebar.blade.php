@php
    $menus = [
        (object) [
            "title" => "Dashboard",
            "path" => "/dashboard/admin",
            "icon" => "fas fa-home" 
        ],
        (object) [
            "title" => "Pengelolaan Anggota",
            "path" => "/pengelolaan-anggota",
            "icon" => "fas fa-users" 
        ],
        (object) [
            "title" => "Jenis Pemeriksaan",
            "path" => "/jenis_pemeriksaan",
            "icon" => "fas fa-stethoscope" 
        ],
        (object) [
            "title" => "Laporan",
            "path" => "/laporan-admin",
            "icon" => "fas fa-chart-line" 
        ],
    ];
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="{{ asset('templates/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          @foreach ($menus as $menu )
            <li class="nav-item">
              <a href="{{ $menu->path }}" class="nav-link">
                <i class="nav-icon {{ $menu->icon }}"></i>
                <p>
                  {{ $menu->title }}
                </p>
              </a>
            </li>
          @endforeach
        </ul>
      </nav>
    </div>
  </aside>