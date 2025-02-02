@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container py-5" style="max-width: 1100px;">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item text-white">Basic details of Registered companies</li>
                <li class="breadcrumb-item text-white">Indonesia</li>
            </ol>
            <h1 class="text-white mb-4">PT. {{ $result->nama_perseroan }} - Indonesia</h1>
        </div>
    </div>
    <!-- Header End -->

    @php
        // Logika untuk menentukan alamat yang benar
        $alamat = $result->alamat_perseroan;
        $kabupaten = $result->kabupaten_nama_perseroan;
        $provinsi = $result->provinsi_nama_perseroan;
        $alamat_alternatif = $kabupaten ? $kabupaten . ', ' . $provinsi : $provinsi;

        $alamat_perseroan = $alamat && $alamat != 'Jl.' && $alamat != '-' ? $alamat : $alamat_alternatif;
    @endphp

    <div class="container-fluid contact bg-light py-3">
        <div class="container py-3">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="bg-white rounded p-4">
                        <div class="text-center mb-4">
                            <i class="fa fa-building fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Registered name</h4>
                            <p class="mb-0">{{ $result->nama_perseroan }}</p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                            <h4 class="text-primary">Address</h4>
                            <p class="mb-0">{!! nl2br(strtoupper(tambahkanSpasi($alamat_perseroan))) !!}</p>
                        </div>

                        <div class="text-center">
                            <i class="fa fa-city fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">City</h4>
                            <p class="mb-0">{{ $kabupaten . ', ' . $provinsi }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-2">Buy company reports</h3>
                    <h5>Latest Government's Record</h5>

                    <form action="{{ url('/add-to-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $result->id_data }}">
                        <input type="hidden" name="product_name" value="{{ $result->nama_perseroan }}">
                        <input type="hidden" name="price" value="100000">
                        <button class="btn btn-primary w-100 py-3" type="submit">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
