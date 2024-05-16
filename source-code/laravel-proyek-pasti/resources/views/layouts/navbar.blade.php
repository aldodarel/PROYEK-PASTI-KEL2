<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>GKPI Sipoholon</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>GKPI Jemaat Khusus Pasar Sipoholon</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home.index') }}" class="{{ $title === 'index' ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="{{ $title === 'ibadah' ? 'active' : '' }}"><span>Data Gereja</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ route('home.ibadah') }}">Tata Ibadah</a></li>
                            <li><a href="#">Statistik Ibadah</a></li>
                            <li><a href="#">Statistik Keuangan</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('home.renungan') }}"
                            class="{{ $title === 'renungan' ? 'active' : '' }}">Renungan
                            Harian</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Tentang Gereja</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="pricing.html">Struktur Organisasi</a></li>
                            <li><a href="#">Rancangan Program Kerja</a></li>
                            <li><a href="#">Cancangan Anggaran Biaya</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="get-a-quote" href="get-a-quote.html">Masuk</a>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    @yield('navbar')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 footer-links">
                    <img src="assets/img/about.jpg" alt="" class="img-fluid" />
                </div>

                <div class="col-lg-4 footer-contact">
                    <h4>GKPI Sipoholon</h4>
                    <p>
                        Jl. Tarutung No.73, Lobusingkam, Kec. Sipoholon, Kabupaten
                        Tapanuli Utara, Sumatera Utara 22452
                    </p>
                </div>

                <div class="col-lg-4 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>
                        Pdt. Marganda Parulian Siregar, S.Th <br />
                        +62 0123456789<br />
                        +62 0123456789<br />
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>GKPI Sipoholon</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
