@extends('layouts.main')
@section('navbar')
<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{asset('template/img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">JobEx</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('register') }}" class="nav-item nav-link active">Beranda</a>
                <a href="{{ route('register') }}" class="nav-item nav-link">Tentang </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pekerjaan</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('register') }}" class="dropdown-item">Daftar Pekerjaan</a>
                        <a href="{{ route('register') }}" class="dropdown-item">Jenis Pekerjaan</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Kontak</a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex" style="margin-right: 23px;" ;>Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-secondary px-3 d-none d-lg-flex">Daftar</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
@endsection
@section('content')
<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <br>
            <br>
            <h1 class="display-5 animated fadeIn mb-4">Temukan <span class="text-primary">Pekerjaan Impian</span> yang Sempurna</h1>
            <p class="animated fadeIn mb-4 pb-2">Jobex adalah platform yang menghubungkan pencari kerja dengan beragam peluang karier, dari startup hingga perusahaan besar, dengan fitur pencarian yang memudahkan menemukan pekerjaan sesuai keahlian dan minat Anda.</p>
            <a href="{{ route('register') }}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Mulai</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{asset('template/img/carousel-1.jpg')}}" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="{{asset('template/img/carousel-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Temukan Pekerjaan">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Tipe Pekerjaan</option>
                            <option value="1">Tipe Pekerjaan 1</option>
                            <option value="2">Tipe Pekerjaan 2</option>
                            <option value="3">Tipe Pekerjaan 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Lokasi</option>
                            <option value="1">Lokasi 1</option>
                            <option value="2">Lokasi 2</option>
                            <option value="3">Lokasi 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Cari</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Tipe Pekerjaan</h1>
            <p>Jobex menyediakan berbagai jenis pekerjaan dari berbagai bidang, seperti teknologi, keuangan, kesehatan, pendidikan, dan lainnya.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-motherboard" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Teknologi</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-coin" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Keuangan</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-hospital" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Kesehatan</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-journals" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Pendidikan</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-bank" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Pemasaran</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-house" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Manufaktur</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-palette" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Desain</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('register') }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <i class="bi bi-pen" style="font-size: 2rem;"></i>
                        </div>
                        <h6>Administrasi</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{asset('template/img/about.jpg')}}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Tempat Terbaik untuk Menemukan Pekerjaan Impian.</h1>
                <p class="mb-4">Dengan Jobex, Anda dapat :</p>
                <p><i class="fa fa-check text-primary me-3"></i>Menjelajahi ribuan lowongan kerja terbaru</p>
                <p><i class="fa fa-check text-primary me-3"></i>Mengunggah CV dan melamar dengan mudah</p>
                <p><i class="fa fa-check text-primary me-3"></i>Mendapatkan rekomendasi pekerjaan sesuai profil Anda</p>
                <p><i class="fa fa-check text-primary me-3"></i>Terhubung langsung dengan perusahaan impian</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('register') }} ">Temukan Lainnya</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('template/img/testimonial-1.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('template/img/testimonial-2.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('template/img/testimonial-3.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection