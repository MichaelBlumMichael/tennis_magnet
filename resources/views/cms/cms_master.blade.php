<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tennis Magnet Admin</title>

  
<link href="{{ asset('cms/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="{{asset('images/demo/logo.png')}}" rel="shortcut icon" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link href="{{ asset('cms/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <script>var BASE_URL = "{{url('')}}/" </script>
  <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar-color sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('cms/dashboard')}}">
        <div class="sidebar-brand-icon cms-logo">
        </div>
        <div class="sidebar-brand-text mx-3">TM Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/menu')}}">
          <span>Menu</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/recom')}}">
          <span>Recommendations</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/content')}}">
          <span>Content</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/categories')}}">
          <span>Categories</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/products')}}">
          <span>Products</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="{{url('cms/orders')}}">
          <span>Orders</span></a>
      </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div class="d-flex justify-content-center">
        <img class="cms-logo" src="{{asset('images/demo/logo.png')}}">
      </div>

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <main role="main" class="col-md-9 col-lg-10 pt-3 px-4">
          @yield('cms_content')
        </main> 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <p class=""> &copy {{ date('Y') }} Tennis Magnet, All rights reserved </p>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>

  <!-- Bootstrap core JavaScript-->
<script src="{{ asset('cms/vendor/jquery-easing/jquery.easing.min.js') }}}}"></script>

  <!-- Core plugin JavaScript-->
<script src="{{ asset('cms/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
<script src="{{ asset('cms/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
<script src="{{ asset('cms/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->

<script src="{{ asset('cms/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('cms/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if( Session::has('sm'))
<script>
    toastr.options.positionClass = 'toast-bottom-center';
    toastr.success("{{ Session::get('sm') }}");
</script>
@endif

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
