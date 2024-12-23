<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pencatatan Posyandu</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('templates/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    @include('tampilan.dashboard_admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('tampilan.dashboard_admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('header')
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024</strong> Sistem Pencatatan Posyandu. Semua Hak Dilindungi.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('templates/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('templates/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#anggotaTable').DataTable({
            "processing": true,
            "serverSide": false,
            "paging": true,
            "searching": true,
            "order": [[0, "asc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"
            }
        });
    });
</script>
@yield('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('alert'))
<script>
    Swal.fire({
        icon: '{{ session('alert.type') }}', // success, error, warning
        title: '{{ session('alert.message') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

<script>
  function confirmLogout(event) {
      event.preventDefault(); // Mencegah aksi default

      Swal.fire({
          title: 'Apakah Anda yakin ingin keluar?',
          text: "Anda akan keluar dari sesi saat ini.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, keluar',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              // Submit form logout jika user mengonfirmasi
              document.getElementById('logout-form').submit();
          }
      });
  }
</script>


</body>
</html>
