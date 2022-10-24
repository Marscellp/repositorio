@include('template.components.styles')
{{--  --}}
<div class="wrapper">
  <!-- Preloader -->
  {{-- @include('template.components.preloader') --}}
  <!-- Navbar -->
  @include('template.components.navbar')
  <!-- Main Sidebar Container -->
  @include('template.components.menu')
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->
  @include('template.components.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('template.components.scripts')