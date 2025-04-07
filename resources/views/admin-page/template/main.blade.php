
@include('admin-page.template.header')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  @include('admin-page.template.sidebar')
  <!--  Main wrapper -->
  <div class="body-wrapper">
  @include('admin-page.template.navbar')
  <!--  Content Wrapper -->
  @yield('content')
  @stack('scripts')
  @include('admin-page.template.fotter')
  @include('admin-page.template.script')
  

     