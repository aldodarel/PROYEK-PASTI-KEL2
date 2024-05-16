@extends('layouts.navbar')


@section('navbar')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up">Lorem Ipsum dolor sit</h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit
                    </p>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">
        <section id="service" class="services pt-0">
            <div class="container pricing" data-aos="fade-up">
                <div class="section-header">
                    <h2>Renungan Harian</h2>
                    <div class="d-flex justify-content-center">
                        @foreach ($renungan1 as $item)
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <h3>{{ $item->title }}</h3>
                                    <p><strong>{{ $item->ayat }}</strong></p>
                                    <p>
                                        Cumque eos in qui numquam. Aut aspernatur perferendis sed
                                        atque quia voluptas quisquam repellendus temporibus
                                        itaqueofficiis odit
                                    </p>
                                    <hr />
                                    <p class="text-start"><b>Tanggal</b></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <a class="buy-btn" href="#">Lihat Seluruh Renungan</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Data Statistik Jemaat</h2>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div>
                                <h3>Jumlah Keluarga</h3>
                                <p>Keluarga</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <h3>Jumlah Pemuda Pemudi</h3>
                            <p>Orang</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <h3>Jumlah Laki-laki (Ama)</h3>
                            <p>Orang</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="card">
                            <h3>Jumlah Perempuan (Ina)</h3>
                            <p>Orang</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="card">
                            <h3>Jumlah Jemaat Aktif</h3>
                            <p>Orang</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="card">
                            <h3>Jumlah Jemaat Tidak Aktif</h3>
                            <p>Orang</p>
                        </div>
                    </div>
                    <!-- End Card Item -->
                </div>
            </div>
        </section>

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-6 content">
                        <h3>Tata Ibadah</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Ibadah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 content">
                        <h3>Jadwal Ibadah</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about pt-0">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-6 content">
                        <h3>Jadwal Kegiatan Pelayanan</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kegiatan</th>
                                    <th>Hari</th>
                                    <th>Pukul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 content">
                        <h3>Sakramen</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Sakramen</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Berita Terbaru Gereja</h2>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/storage-service.jpg" alt="" class="img-fluid" />
                            </div>
                            <h3>
                                <a href="service-details.html" class="stretched-link">Storage</a>
                            </h3>
                            <p>
                                Cumque eos in qui numquam. Aut aspernatur perferendis sed
                                atque quia voluptas quisquam repellendus temporibus
                                itaqueofficiis odit
                            </p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/logistics-service.jpg" alt="" class="img-fluid" />
                            </div>
                            <h3>
                                <a href="service-details.html" class="stretched-link">Logistics</a>
                            </h3>
                            <p>
                                Asperiores provident dolor accusamus pariatur dolore nam id
                                audantium ut et iure incidunt molestiae dolor ipsam ducimus
                                occaecati nisi
                            </p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/cargo-service.jpg" alt="" class="img-fluid" />
                            </div>
                            <h3>
                                <a href="service-details.html" class="stretched-link">Cargo</a>
                            </h3>
                            <p>
                                Dicta quam similique quia architecto eos nisi aut ratione aut
                                ipsum reiciendis sit doloremque oluptatem aut et molestiae ut
                                et nihil
                            </p>
                        </div>
                    </div>
                    <!-- End Card Item -->
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
