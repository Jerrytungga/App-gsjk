
@include('user-page.template.header')
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  @include('user-page.template.sidebar')
  <!--  Main wrapper -->
  <div class="body-wrapper">
  @include('user-page.template.navbar')
  <!--  Content Wrapper -->
  @yield('content')
  @stack('scripts')
  @include('user-page.template.fotter')
  @include('user-page.template.script')
  

     