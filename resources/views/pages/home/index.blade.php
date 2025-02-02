@extends('layouts.app')

@section('content')
    <!-- Navbar & Hero End -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('home-assets/img/carousel-4.jpg') }}" class="img-fluid"
                        alt="Photo by S O C I A L . C U T on Unsplash">
                    <div class="carousel-caption">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">
                                        Explore The World</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Let's The World Together!</h1>
                                    <p class="mb-5 fs-5">Temukan informasi lengkap mengenai pendirian dan kepemilikan saham
                                        perusahaan swasta terdaftar di Indonesia
                                    </p>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="position-relative rounded-pill w-100 mx-auto p-4"
                                    style="background: rgba(19, 53, 123, 0.8);">
                                    <form class="search-wrapper position-relative" method="post">
                                        <input id="keyword"
                                            class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                            placeholder="Cari nama perusahaan disini..." autocomplete="off">
                                        <button type="button"
                                            class="btn btn-primary rounded-pill py-2 px-4 position-absolute"
                                            style="top: 50%; right: 20px; transform: translateY(-50%);">Search</button>
                                        <div id="search-results" class="search-results-dropdown position-absolute"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="container-fluid contact bg-light py-3">
        <div class="container py-5">
            <div class="row g-5 align-items-center">

                <div class="mx-auto text-center mb-3" style="max-width: 900px;">
                    <h2 class="section-title px-3">Apa yang akan kamu dapatkan?</h2>
                    {{-- <h1 class="mb-0">Apa yang akan kamu dapatkan?</h1> --}}
                </div>

                <div class="col-lg-10 col-12 mt-3 mx-auto">
                    <div class="bg-white rounded p-4 mb-3 shadow">
                        <div class="d-flex">
                            <div>
                                <h4 class="mb-2">Informasi dan Status Perusahaan</h4>
                                <p class="mb-2">
                                    Dapatkan detail lengkap tentang status perusahaan, apakah aktif, tidak aktif, dalam
                                    arbitrase (misalnya, berada di bawah pengadilan hukum perusahaan karena konflik),
                                    serta informasi dasar lainnya.
                                </p>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Status Perusahaan:</div>
                                            Aktif atau Tidak Aktif, termasuk penghentian karena arbitrase atau
                                            yurisdiksi.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Detail Pembaruan Terakhir:</div>
                                            Tanggal, alamat resmi, akta pendirian, sertifikat, pendiri, pemegang saham,
                                            dan ekuitas.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Jenis dan Klasifikasi</div>
                                            Kategori bisnis, sub-kategori, tujuan, dan jenis operasional sesuai akta
                                            pendirian.
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded p-4 mb-3 shadow">
                        <div class="d-flex">
                            <div>
                                <h4 class="mb-2">
                                    Keuangan dan Kepemilikan Perusahaan</h4>
                                <p>Dapatkan daftar lengkap pemegang saham, direktur, dan perwakilan
                                    perusahaan, beserta struktur modal dan perkembangan modal perusahaan sejak
                                    didirikan.</p>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Struktur Modal:</div>
                                            Daftar pemegang saham, direktur, dan perwakilan, serta perkembangan modal
                                            sejak pendirian.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Total Modal:</div>
                                            Informasi modal disetor, modal diotorisasi, jumlah saham, dan harga per
                                            saham.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Pemegang Saham:</div>
                                            Daftar pemegang saham dan perubahan kepemilikan saham.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Direktur dan Perwakilan:</div>
                                            Daftar direktur, perwakilan, dan detail kepemilikan saham mereka.
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded p-4 mb-3 shadow">
                        <div class="d-flex">
                            <div>
                                <h4 class="mb-2">
                                    Perubahan Struktur Korporasi dan Sejarahnya</h4>
                                <p>Dapatkan daftar lengkap sejarah struktur korporasi.</p>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Perubahan Struktur Korporasi:</div>
                                            Detail tentang status perusahaan yang aktif, tidak aktif, atau dihentikan
                                            akibat arbitrase, yurisdiksi, atau faktor lain.
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Perubahan Modal dan Investasi:</div>
                                            Informasi menyeluruh tentang akta pendirian, sertifikat, pendiri, pemegang
                                            saham, ekuitas, dan alamat resmi perusahaan.
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <div class="container-fluid bg-light service py-3">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Get the report</h5>
                <h1 class="mb-0">How it works?</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="service-content-inner d-flex bg-white border border-primary rounded p-4 min-vh-25">
                                <div class="service-content">
                                    <h5 class="mb-4">Search company name</h5>
                                    <p class="mb-0">Find the companies on the homepage that interest you and add them to
                                        the cart.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="service-content-inner d-flex bg-white border border-primary rounded p-4 min-vh-25">
                                <div class="service-content">
                                    <h5 class="mb-4">Place an order</h5>
                                    <p class="mb-0">Review all company details and estimated delivery time (varies by
                                        country). Proceed with the payment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="service-content-inner d-flex bg-white border border-primary rounded p-4 min-vh-25">
                                <div class="service-content">
                                    {{-- <img loading="lazy" src="{{ asset('home-assets/img/verified-svgrepo-com.svg') }}"
                                        height="20%" width="20%" class="text-center" alt="data"> --}}
                                    <h5 class="mb-4">
                                        Collect
                                        report by email
                                    </h5>
                                    <p class="mb-0">We will gather the data and send you an email within the specified
                                        timeframe.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-5" href="">Service More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
