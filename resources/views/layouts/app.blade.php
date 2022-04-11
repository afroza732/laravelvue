@include('layouts.partials._head')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  
  @include('layouts.partials._nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials._sidebar')
  <div class="content-wrapper" id="app">
    {{-- <product-component></product-component> --}}
    {{-- <example-component></example-component> --}}
    @yield('main-content')
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.partials._footer')
