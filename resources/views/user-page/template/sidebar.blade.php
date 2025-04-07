 <!-- Sidebar Start -->
 <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="../src/assets/images/logos/dark-logo.svg" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard-user')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
            <li class="nav-small-cap">
              <i class="ti ti-compass nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data</span>
          </li>
      

          <li class="sidebar-item">
            <a class="sidebar-link"  href="{{ route('halaman-kaum-saleh-user')}}" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">Kaum Saleh</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">Kontakan TIA & TIK</span>
            </a>
          </li>

        
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Menu</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-school"></i>
              </span>
              <span class="hide-menu">Sekolah</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-school"></i>
              </span>
              <span class="hide-menu">Universitas</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-home"></i>
              </span>
              <span class="hide-menu">Alamat Balai sidang</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-file"></i>
              </span>
              <span class="hide-menu">List Baptisan</span>
            </a>
          </li>
          
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Rumah Belajar</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">Peserta</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="ti ti-file"></i>
              </span>
              <span class="hide-menu">Presensi</span>
            </a>
          </li>





        
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">File Manager</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">File Administrasi Gereja</span>
            </a>
          </li>
         
        
       
        </ul>
        @if (session('role'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Selamat!</strong>, anda berhasil masuk sebagai {{ session('role') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

     @endif
      </nav>
      <!-- End Sidebar navigation -->

      
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->