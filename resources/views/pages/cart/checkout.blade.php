@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container py-5" style="max-width: 1100px;">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item text-white">Home</li>
                <li class="breadcrumb-item text-white">Cart</li>
                <li class="breadcrumb-item text-white">Checkout</li>
            </ol>
            <h1 class="text-white mb-4">Checkout</h1>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid contact bg-light py-3">
        <div class="container py-3">
            <div class="row g-5 justify-content-center">
                <div class="col-md-10 col-12">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-white rounded p-4">
                        <div>
                            {{-- <p>Silakan pilih metode pembayaran:</p> --}}
                            <iframe src="{{ $invoiceUrl }}" width="100%" height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
