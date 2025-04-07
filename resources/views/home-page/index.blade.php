<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GSJK | Home</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between" data-aos="fade-down">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">GSJK</h1>
      </a>

      <nav id="navmenu" class="navmenu" data-aos="fade-left">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#jadwal">Jadwal Sidang</a></li>
          <li><a href="#visimisi">Visi & Misi</a></li>
          <li><a href="#maps">Maps</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" target="_blank" href="{{ Route('halaman_login')}}" data-aos="fade-right">Masuk</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <div class="company-badge mb-4">
                <i class="bi bi-maps-fill me-2"></i>
                Wilayah 8
              </div>

              <h1 class="mb-4">
               GEREJA SIDANG JEMAAT KRISTUS
              </h1>

              <p class="mb-4 mb-md-5">
                Dan marilah kita saling memperhatikan supaya kita saling <br>
                mendorong dalam kasih dan dalam pekerjaan baik.
                <span><h6>— Ibrani 10:24 —</h6></span>
              </p>

              <div class="hero-buttons">
                {{-- <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1" data-aos="fade-up" data-aos-delay="300">Get Started</a> --}}
                <a href="#" class="btn btn-link mt-2 mt-sm-0 glightbox" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-play-circle me-1"></i>
                  Play Video
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <img src="assets/img/logo.png" alt="Hero Image" class="img-fluid">
            </div>
          </div>
        </div>

                      



                      </div>

    </section><!-- /Hero Section -->


    <!-- Features Section -->
    <section id="jadwal" class=" section">

      <!-- Section Title -->
      <div class="container " data-aos-delay="400" >

        <center>
          <div class="container section-title" >
           
            <h2 >JADWAL SIDANG-SIDANG GEREJA WILAYAH 8</h2>
          </div><!-- End Section Title -->
          <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6">
              <div class="input-group mb-3">
                <select name="" id="" class="form-select">
                  <option value="Mimika">Mimika</option>
                  <option value="Sorong">Sorong</option>
                  <option value="Ambon">Ambon</option>
                  <option value="Paniai">Paniai</option>
                </select>
                <button class="btn btn-primary" type="button">Lihat Jadwal</button>
              </div>
            </div>
          </div>
        </center>
      </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="400">
<hr>
<table class="table table-striped table-hover">
  <thead class="table-success">
  <tr>
      <th scope="col">No</th>
      <th scope="col">Sidang Gereja</th>
      <th scope="col">Hari</th>
      <th scope="col">Waktu</th>
      <th scope="col">Tempat</th>
  </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>Sidang Pemecahan Roti</td>
      <td>Minggu</td>
      <td>09:00 - 11:00 WIT</td>
      <td>Mimika Baru dan Wania</td>
  </tr>
  <tr>
      <th scope="row">2</th>
      <td>Sidang Doa</td>
      <td>Sabtu</td>
      <td>19:00 - 20:00 WIT</td>
      <td>Mimika Baru dan Wania</td>
  </tr>
  <tr>
      <th scope="row">3</th>
      <td>Sidang Remaja</td>
      <td>Sabtu</td>
      <td>17:00 - 18:00 WIT</td>
      <td>Mimika Baru</td>
  </tr>
  <tr>
      <th scope="row">4</th>
      <td>Sidang Pemuda</td>
      <td>Sabtu</td>
      <td>17:00 - 18:00 WIT</td>
      <td>Mimika Baru</td>
  </tr>
  <tr>
      <th scope="row">5</th>
      <td>Sidang Saudari</td>
      <td>Jumat</td>
      <td>19:00 - 20:30 WIT</td>
      <td>Online</td>
  </tr>

  </tbody>
</table>
<hr>
       
      </div>

    </section><!-- /Features Section -->

    <!-- Services Section -->
    <section id="visimisi" class=" section light-background">

      <!-- Section Title -->
      <div class="container section-title" >
        <h2>Visi & Misi</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-sm-7">
            <h1><span>Misi Kami</span></h1>
            <p class="hero-h2">* Kami memberitakan injil kasih karunia dan injil ke­rajaan kepada orang-orang berdosa agar mereka dapat diselamatkan. <br>
            * Kami meministrikan suplai hayat kepada kaum ber­iman agar mereka dapat bertumbuh dalam Kristus. <br>
            * Kami mendirikan gereja di setiap kota agar kaum ber­iman dapat menjadi ekspresi korporat Kristus di lokal secara praktis. <br>
            * Kami melepaskan firman Allah yang hidup dan kaya agar kaum beriman dapat dirawat untuk bertumbuh dan dewasa. <br>
           * Kami membangun Tubuh Kristus sehingga mempelai perempuan dapat disiapkan untuk kedatangan kembali Kristus se­bagai Mempelai Laki-laki.</p>
        </div>
        <div class="col-sm-4">
            <img src="assets/img/alkitab-logo.png" class="img-fluid rounded" alt="Deskripsi Gambar" data-aos="fade-left">
         </div>


         <div class="row align-items-center" style="margin-top: 50px; text-align: right;">
          <div class="col-sm-4">
              <img src="assets/img/thebook-logo.png" class="img-fluid rounded" alt="Deskripsi Gambar" data-aos="fade-right">
           </div>
          <div class="col-sm-7">
              <h1><span>Harapan Kami</span></h1>
              <p class="hero-h2">* Kami berharap agar sejumlah orang yang ditetapkan Allah kepada hayat kekal akan percaya dalam Tuhan Yesus. <br>
              * Kami berharap agar semua orang Kristen yang dilahir­kan kembali akan menuntut pertumbuhan dalam hayat, bukan se­mata bertambah pengetahuan. <br>
          * Kami berharap agar semua pencari Kristus akan me­lihat visi gereja dan masuk ke dalam pelaksanaan kehidupan gereja dalam lokalitas mereka. <br>
      * Kami berharap agar Tuhan menyisihkan para peme­nang agar mempelai perempuan-Nya dipersiapkan. <br>
      * Kami berharap agar kedatangan kembali Tuhan diper­cepat melalui pertumbuhan hayat kami dan agar kami dapat ber­bagian dalam berkat terangkat dan kerajaan-Nya yang akan datang.</p>
          </div>
          
        </div>
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Call To Action 2 Section -->
    <section id="maps" class="call-to-action-2 section info-background">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <div class="container section-title" data-aos="fade-up">
                <h2>Maps Perluasan</h2>
              </div><!-- End Section Title -->
              <hr>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/d/embed?mid=1e71-01S06POS-gzheZTYlOALAPBS-rA&ehbc=2E312F" width="1040" height="480"></iframe>
              </div>
              <hr>
            </div>
          </div>
        </div>


        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              
              <div class="stat-content">
                <h4>JAYAPURA</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-content">
                <h4>MIMIKA</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-content">
                <h4>SORONG</h4>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-content">
                <h4>AMBON</h4>
              </div>
            </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
              <div class="stat-item">
                <div class="stat-content">
                  <h4>PANIAI</h4>
                </div>
              </div>
              </div>
              
              <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                  <div class="stat-content">
                    <h4>MERAUKE</h4>
                  </div>
                </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                  <div class="stat-item">
                    <div class="stat-content">
                      <h4>MAYBRAT</h4>
                    </div>
                  </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                      <div class="stat-content">
                        <h4>MANOKWARI</h4>
                      </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                      <div class="stat-item">
                        <div class="stat-content">
                          <h4>JAYAWIJAYA</h4>
                        </div>
                      </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                          <div class="stat-content">
                            <h4>BOVENDIGOEL</h4>
                          </div>
                        </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="stat-item">
                            <div class="stat-content">
                              <h4>BIAK</h4>
                            </div>
                          </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                              <div class="stat-content">
                                <h4>AIMAS</h4>
                              </div>
                            </div>
                            </div>
                      </div>





      </div>

    </section><!-- /Call To Action 2 Section -->

  </main>

  <footer class="text-white py-4 mt-5 bg-primary">
    <div class="container">
     
      <div class="text-center mt-3">
      <h5 class="text-light">Gereja Sidang Jemaat Kristus</h5>
          <p>Ijin Dirjen Bimas (Kristen) Protestan Dep. Agama RI No. 79/1987<br>Anggota PGI KE 92 No.007/PGI-XVII-SKEP/2022 <br>
Rekening Bank Mandiri Gereja Sidang Jemaat Kristus : -
</p>
         
        <p>&copy; 2024 Gereja Sidang Jemaat Kristus. Semua Hak Dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>