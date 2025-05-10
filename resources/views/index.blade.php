<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - RSPPN Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('landing') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('landing') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing') }}/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: RSPPN
  * Template URL: https://bootstrapmade.com/RSPPN-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">
        <div class="branding d-flex align-items-center">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('logo.png') }}" alt="">
                    <h1 class="sitename">RSPPN</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1>Selamat Datang di Sistem E-Learning <span>RSPPN</span></h1>
                        <p>
                            Platform pembelajaran digital untuk mendukung program magang dan pengembangan kompetensi
                            mahasiswa kesehatan.
                        </p>
                        <div class="d-flex">
                            <a href="/login" class="btn-get-started">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section id="realtime-survey" class="featured-services section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-clipboard-data icon"></i></div>
                            <h4><a href="/survei/1" class="stretched-link">Survei Kepuasan Pelanggan</a></h4>
                            <p>Isi survei tentang pengalaman pengguna dalam 5 menit.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-people icon"></i></div>
                            <h4><a href="/survei/2" class="stretched-link">Survei Karyawan</a></h4>
                            <p>Evaluasi lingkungan kerja dan komunikasi antar tim.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-geo-alt icon"></i></div>
                            <h4><a href="/survei/3" class="stretched-link">Survei Lokasi</a></h4>
                            <p>Kumpulkan data lokasi penggunaan layanan dalam waktu nyata.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bar-chart icon"></i></div>
                            <h4><a href="/survei/4" class="stretched-link">Survei Produk Baru</a></h4>
                            <p>Berikan opini Anda tentang fitur dan desain produk terbaru.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
                <p><span>Kenal Lebih Dekat Dengan</span> <span class="description-title">RSPPN</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-3">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('rs.jpg') }}" alt="Rumah Sakit Pertahanan Negara" class="img-fluid">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3>Rumah Sakit Pertahanan Negara (RSPPN)</h3>
                            <p class="fst-italic">
                                RSPPN hadir sebagai garda terdepan dalam pelayanan kesehatan bagi personel pertahanan
                                dan masyarakat umum.
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-diagram-3"></i>
                                    <div>
                                        <h4>Layanan Kesehatan Komprehensif</h4>
                                        <p>Menyediakan layanan medis dari unit gawat darurat, rawat inap, bedah, hingga
                                            layanan spesialis militer dan sipil.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-fullscreen-exit"></i>
                                    <div>
                                        <h4>Didukung Teknologi dan Tenaga Profesional</h4>
                                        <p>Dilengkapi peralatan medis modern serta tenaga kesehatan terlatih untuk
                                            menjamin kualitas layanan optimal.</p>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                Dengan semangat pengabdian kepada negara, RSPPN berkomitmen menjadi rumah sakit rujukan
                                pertahanan yang unggul, terpercaya, dan responsif dalam menghadapi tantangan kesehatan
                                di era modern.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p><span>Butuh Bantuan?</span> <span class="description-title">Hubungi Kami</span></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>Jl. Raya Pertahanan No.1, Jakarta, Indonesia</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Telepon</h3>
                                    <p>+62 21 1234 5678</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email</h3>
                                    <p>info@rsppn.go.id</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.376627930902!2d106.81666631476953!3d-6.212616995506128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e6e6f0b371%3A0x7f5c2e2e5b6f1c0b!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Anda</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email Anda</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subjek</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Pesan</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Memuat...</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah berhasil dikirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">RSPPN</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Adam No. 108</p>
                        <p>Jakarta, Indonesia 12345</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>+62 812 3456 7890</span></p>
                        <p><strong>Email:</strong> <span>info@rsppn.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <!-- Tambahkan tautan jika diperlukan -->
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <!-- Tambahkan tautan jika diperlukan -->
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Ikuti Kami</h4>
                    <p>Ikuti kami di media sosial untuk mendapatkan informasi terbaru dan promo menarik lainnya.</p>
                    <div class="social-links d-flex">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">RSPPN</strong> <span>Seluruh Hak
                    Dilindungi</span>
            </p>
            <div class="credits">
                Dirancang oleh <a href="https://bootstrapmade.com/">BootstrapMade</a> dan didistribusikan oleh <a
                    href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>

    </footer>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('landing') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing') }}/assets/js/main.js"></script>

</body>

</html>
