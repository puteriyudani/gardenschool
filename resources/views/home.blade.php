@extends('layouts.layout')

@section('style')
@endsection

@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active item1">
                    <div class="carousel-caption d-md-block">
                        <div class="container" data-aos="zoom-in" data-aos-delay="100">
                            <p>d'happiest <span class="typed" data-typed-items="Islamic pre-school"></span></p>
                            <div class="social-links">
                                <a href="https://wa.me/6282268081212" class="twitter" target="_blank"
                                    style="color: #25D366"><i class="bx bxl-whatsapp"></i></a>
                                <a href="https://www.facebook.com/gardenschool.gardenschool" class="facebook"
                                    target="_blank" style="color: #4267B2"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/gardenschool_official/" class="instagram" target="_blank"
                                    style="color: #C13584"><i class="bx bxl-instagram"></i></a>
                                <a href="https://www.tiktok.com/@gardenschool2" class="instagram" target="_blank"
                                    style="color: #000000"><i class="bx bxl-tiktok"></i></a>
                                <a href="https://www.youtube.com/@gardenschool2246" class="instagram" target="_blank"
                                    style="color: #FF0000"><i class="bx bxl-youtube"></i></a>
                            </div>
                            <div class="d-flex join">
                                <a href="{{ route('joinus') }}" class="btn btn-info me-2" role="button"
                                    target="_blank">Join us</a>
                                <a href="#" class="btn btn-warning" role="button"
                                    target="_blank">Franchise</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item item2">
                </div>
                <div class="carousel-item item3">
                </div>
                <div class="carousel-item item4">
                </div>
                <div class="carousel-item item5">
                </div>
                <div class="carousel-item item6">
                </div>
                <div class="carousel-item item7">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section id="tombol" class="d-flex flex-column justify-content-center">
            <div class="row tombol">
                <div class="col">
                    <a href="/#about">
                        <img src="{{ asset('assets') }}/img/buttonprofile.png" alt="...">
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('program.index') }}">
                        <img src="{{ asset('assets') }}/img/buttonprogram.png" alt="...">
                    </a>
                </div>
                <div class="col hugsme">
                    <a href="{{ route('login') }}" target="_blank">
                        <img src="{{ asset('assets') }}/img/buttonhugs.png" alt="...">
                    </a>
                </div>
                <div class="col">
                    <a href="/#support">
                        <img src="{{ asset('assets') }}/img/buttonsupport.png" alt="...">
                    </a>
                </div>
                <div class="col">
                    <a href="#" onclick="showPopup()">
                        <img src="{{ asset('assets') }}/img/buttonshop.png" alt="...">
                    </a>
                </div>
            </div>
        </section>
    </section><!-- End Hero -->
@endsection

@section('main')
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 text-center">
                        <img src="{{ asset('assets') }}/img/gs.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content">
                        <h3>Garden School</h3>
                        <p class="fst-italic">
                            Sahabat Daun Indonesia
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Tahun Berdiri:</strong> <span>7 Juli
                                            2021</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <span>www.example.com</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Alamat:</strong> <span>Gg. Cahaya, Desa
                                            Senggoro, Kab.Bengkalis, Riau</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span>gardenschoolindonesia@gmail.com</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>No WhatsApp:</strong>
                                        <span>+6282268081212</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h5>Visi</h5>
                        <p>
                            Menjadi sekolah yang berkualitas dengan menggabungkan Budi Pekerti dan IPTEK sehingga
                            menghasilkan manusia yang Berkarakter, Cerdas, Kreatif, Mandiri.
                        </p>

                        <h5>Tujuan</h5>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Memberi Layanan Perkembangan Anak Usia Dini Kepada Masyarakat Bengkalis</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Mitra Tumbuh Kembang anak bersama Orang Tua</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Memberikan Layanan PAUD Holistik Integratif</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h5>Misi</h5>
                        <ul>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Menyiapkan generasi yang unggul di bidang Imtaq dan Iptek</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Membentuk karakter dengan pembiasaan 6 budi pekerti yang baik dan benar, jujur, dapat
                                    dipercaya, hemat dan kerja keras</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Membentuk sumber daya manusia yang aktif, kreatif, inovatif, dan sportif</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Membangun Citra sekolah sebagai Mitra terpercaya di masyarakat</p>
                            </li>
                            <li>
                                <i class="bi bi-chevron-right"></i>
                                <p>Memberikan jaminan pelayanan yang prima dalam berbagai hal untuk mendukung proses belajar
                                    dan bekerja yang harmonis dan selaras</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Support Section ======= -->
        <section id="support" class="skills section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Support</h2>
                </div>

                <div class="row skills-content text-center">

                    <div class="col-4">
                        <img src="{{ asset('auth') }}/images/rcq.png" alt="" width="100" height="100">
                        <h4><a target="_blank"
                                href="https://www.instagram.com/rcqbengkalisofficial/profilecard/?igsh=a253NjA0dGYzZmNy">Rumah
                                Cerdas Quran</a></h4>
                    </div>

                    <div class="col-4">
                        <img src="{{ asset('auth') }}/images/english.png" alt="" width="100" height="100">
                        <h4><a target="_blank"
                                href="https://www.instagram.com/aozoralearningcenter/profilecard/?igsh=MWd1NzY4OW12NHh3aw==">Aozora</a>
                        </h4>
                    </div>

                    <div class="col-4">
                        <img src="{{ asset('auth') }}/images/imagi.jpeg" alt="" width="100" height="100">
                        <h4><a target="_blank" href="https://www.instagram.com/pt.imagi/">IMAGI</a></h4>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Support Section -->

    </main><!-- End #main -->
@endsection
