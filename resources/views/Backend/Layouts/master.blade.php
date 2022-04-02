@extends('Backend.Layouts.app')
@section('app-content')

<div class="wrapper">

  <!-- Navbar -->
    @includeIf('Backend.Partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @includeIf('Backend.Partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @includeIf('Backend.Partials.breadcrumb')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('master-content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @includeIf('Backend.Partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection
