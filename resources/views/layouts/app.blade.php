<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('home-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('home-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('home-assets/css/style.css') }}" rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-12">
                <marquee class="p-1 text-white">Selamat datang di website kami padatin.com. Website ini masih dalam
                    pengembangan</marquee>
            </div>
            {{-- <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">

                    @if (Auth::check())
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i
                                        class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="{{ route('dashboard') }}" class="dropdown-item">
                                    My Dashboard</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('register') }}"><small class="me-3 text-light"><i
                                    class="fa fa-user me-2"></i>Register</small></a>
                        <a href="{{ route('login') }}"><small class="me-3 text-light"><i
                                    class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                    @endif
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand p-2">
                <h1 class="m-0">Padatin</h1>
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    {{-- <a href="index.html" class="nav-item nav-link active">Home</a> --}}
                </div>

            </div>
            {{-- <a href="javascript:void(0)" class="btn btn-primary rounded-pill ms-lg-4 position-relative" id="cartButton" type="button"> --}}
            <a href="{{ route('cart.index') }}" class="btn btn-primary rounded-pill ms-lg-4 position-relative"
                id="cartButton" type="button">
                <i class="bi bi-basket"></i>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                    {{ $totalItems }}
                </span>
            </a>

            {{-- <ul class="sub-menu">
                @if (empty($cart))
                    <li>Cart is empty</li>
                @else
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach ($cart as $key => $value)
                        @php
                            $total = $value['price'] * $value['quantity'];
                        @endphp

                        <li>
                            <table class="cart-table">
                                <tr class="table-body-row">
                                    <td colspan="4"><b>{{ $value['name'] }}</b></td>
                                </tr>
                                <tr class="table-body-row" data-id="{{ $key }}">
                                    <td class="text-end">
                                        <span class="quantity-text">{{ $value['quantity'] }}</span>
                                    </td>
                                    <td class="text-end">{{ number_format($value['price']) }}</td>
                                    <td class="text-end">
                                        <span class="total-price">{{ number_format($total) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.remove', ['id' => $key]) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        @php
                            $total_price += $total;
                        @endphp
                    @endforeach

                    <li>
                        <table class="cart-table">
                            <tbody>
                                <tr class="result">
                                    <td>Total:</td>
                                    <td class="text-end grandtotal">
                                        <strong>{{ number_format($total_price) }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}">View Cart</a>
                    </li>
                    <li>
                        <a href="{{ route('checkout') }}">Checkout</a>
                    </li>
                @endif
            </ul> --}}
        </nav>

        <!-- Carousel Start -->
        <!-- Carousel End -->
    </div>

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid footer py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Get In Touch</h4>
                        <a href=""><i class="fas fa-home me-2"></i> Gedung Menara 165 Lantai 4, Jalan TB
                            Simatupang Kav. 1, RT 009, RW 003, Kelurahan Cilandak Timur, Kecamatan Pasar Minggu, Kota
                            Jakarta Selatan, 12560</a>
                        <a href=""><i class="fas fa-envelope me-2"></i> administrasi@padatin.com</a>
                        <a href=""><i class="fas fa-phone me-2"></i> 0811xxxxxxxxx</a>
                        <div class="d-flex align-items-center mt-3">
                            <i class="fas fa-share fa-2x text-white me-2"></i>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Company</h4>
                        <a href=""><i class="fas fa-angle-right me-2"></i> About</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Careers</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Blog</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Press</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Gift Cards</a>
                        <a href=""><i class="fas fa-angle-right me-2"></i> Magazine</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-3">Payments</h4>
                        <div class="footer-bank-card">
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-amex fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-visa fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fas fa-credit-card fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-mastercard fa-2x"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-cc-paypal fa-2x"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-cc-discover fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright text-body py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <i class="fas fa-copyright me-2"></i><?= date('Y') ?><a class="text-white" href="#">
                        Padatin</a>,
                    All right reserved.
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('home-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home-assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home-assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <script>
        const BASE_URL = {!! json_encode(route('home.searchCompany')) !!};

        $(document).ready(function() {
            let typingTimer; // Variabel untuk menampung ID timer
            const doneTypingInterval = 500; // Waktu delay (500 ms)

            // Tangkap event ketika pengguna mengetik
            $('#keyword').on('keyup', function() {
                clearTimeout(typingTimer); // Hapus timer yang sebelumnya
                const keyword = $(this).val(); // Ambil nilai input

                if (keyword.length >= 3) { // Pencarian dilakukan jika panjang input >= 3 karakter
                    $('#search-results').html('<p class="text-info mt-3">Sedang mencari...</p>')
                        .show(); // Tampilkan indikator

                    typingTimer = setTimeout(function() { // Set timer untuk pencarian setelah delay
                        $.ajax({
                            url: BASE_URL, // URL Laravel route
                            type: 'GET',
                            data: {
                                keyword: keyword
                            },
                            success: function(data) {
                                if (data.trim() !== '') {
                                    $('#search-results').html(data)
                                        .show(); // Tampilkan hasil pencarian
                                } else {
                                    $('#search-results').html(
                                        '<p class="text-muted">Tidak ada hasil ditemukan</p>'
                                    ).show(); // Tampilkan pesan jika tidak ada hasil
                                }
                            },
                            error: function() {
                                $('#search-results').html(
                                    '<p class="text-danger">Terjadi kesalahan!</p>'
                                ).show(); // Tampilkan error
                            },
                        });
                    }, doneTypingInterval);
                } else {
                    $('#search-results').html('')
                        .hide(); // Sembunyikan hasil jika input kurang dari 3 karakter
                }
            });

            // Menutup dropdown saat user klik di luar input
            $(document).click(function(e) {
                if (!$(e.target).closest('#keyword, #search-results').length) {
                    $('#search-results').html('').hide(); // Menyembunyikan hasil pencarian
                }
            });
            $(document).on('click', '.search-result-item a', function(event) {
                console.log("Link diklik:", $(this).attr('href'));
            });

        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Ambil token dari meta tag
                }
            });
            let timeout = null;

            $(document).on("input", ".form-control[name='quantity']", function() {
                let inputField = $(this);
                let quantity = inputField.val();
                let itemId = inputField.closest("tr").find("a.btn").attr("href").split('/')
                    .pop(); // Ambil ID dari URL
                let price1 = parseFloat(inputField.closest("tr.cart-page").find("td:eq(3)").text().replace(
                    /,/g, ''));
                let price2 = parseFloat(inputField.closest("tr.table-body-row").find("td:eq(1)").text()
                    .replace(/,/g, ''));

                clearTimeout(timeout); // Reset timeout jika user masih mengetik

                // timeout = setTimeout(function() {
                $.ajax({
                    url: "/cart/update", // Route untuk update cart
                    type: "POST",
                    data: {
                        // _token: "{{ csrf_token() }}", // Laravel CSRF Token
                        id: itemId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update total harga di tabel
                            inputField.closest("tr.cart-page").find("td:eq(4)").text(
                                formatNumber(price1 *
                                    quantity));
                            inputField.closest("tr.table-body-row").find("td:eq(1)").text(
                                formatNumber(
                                    price1));
                            inputField.closest("tr.table-body-row").find("td:eq(2)").text(
                                formatNumber(
                                    price1 *
                                    quantity));

                            // Update total item di cart badge
                            updateCartTotal();
                            updateGrandTotal();
                        }
                    },
                    error: function() {
                        console.error("Gagal mengupdate keranjang.");
                    }
                });
                // }, 0); // Menunggu 0.5 detik sebelum mengirim AJAX
            });

            function updateCartTotal() {
                $.ajax({
                    url: "/cart/total", // Endpoint untuk mengambil total terbaru
                    type: "GET",
                    success: function(response) {
                        if (response.success) {
                            $("#cartButton .badge").text(response.totalItems); // Update badge cart
                        }
                    },
                    error: function() {
                        console.error("Gagal memperbarui total item.");
                    }
                });
            }

            function updateGrandTotal() {
                let grandTotal = 0;
                let grandTotal2 = 0;

                $(".cart-page .total-price").each(function() {
                    let total = parseFloat($(this).text().replace(/,/g, '')) || 0;
                    grandTotal += total;
                });

                $("tbody tr.result td.grandtotal strong").text("Rp. " + formatNumber(grandTotal));
            }

            function formatNumber(number) {
                // Pisahkan bagian integer dan desimal
                let parts = number.toString().split(",");

                // Format bagian integer dengan pemisah ribuan
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                // Gabungkan bagian integer dan desimal dengan koma sebagai pemisah desimal
                return parts.join(",");
            }

        });
    </script>


    <!-- Template Javascript -->
    <script src="{{ asset('home-assets/js/main.js') }}"></script>
    <script>
        // Ketika tombol cart diklik
        $('#cartButton').click(function() {
            // Menampilkan atau menyembunyikan daftar cart
            $('.sub-menu').toggle();
        });
    </script>
</body>

</html>
