@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container py-5" style="max-width: 1100px;">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item text-white">Home</li>
                <li class="breadcrumb-item text-white">Cart</li>
            </ol>
            <h1 class="text-white mb-4">Cart</h1>
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
                        <div class="table-responsive cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center w-10">Quantity</th>
                                        <th class="text-center w-15">Price</th>
                                        <th class="text-center w-15">Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (empty($cart))
                                        <tr>
                                            <td colspan="6" class="text-center">Cart is empty</td>
                                        </tr>
                                    @else
                                        @php
                                            $no = 1;
                                            $grand_total = 0;
                                        @endphp
                                        @foreach ($cart as $key => $value)
                                            @php
                                                $total = $value['price'] * $value['quantity'];
                                                $grand_total += $total;
                                            @endphp
                                            <tr class="cart-page" data-id="{{ $key }}">
                                                <td class="text-center">{{ $no++ }}.</td>
                                                <td class="text-start">{{ $value['name'] }}</td>
                                                <td class="text-end">
                                                    {{ $value['quantity'] }}
                                                    {{-- <input type="number" name="quantity"
                                                        class="form-control quantity-input" min="1"
                                                        value="{{ $value['quantity'] }}"> --}}
                                                </td>
                                                <td class="text-end">{{ number_format($value['price']) }}</td>
                                                <td class="text-end total-price">{{ number_format($total) }}</td>
                                                <td>
                                                    <a href="{{ route('cart.remove', ['id' => $key]) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="result">
                                            <td colspan="4"><strong>GRAND TOTAL</strong></td>
                                            <td class="text-end grandtotal">
                                                <strong>Rp. {{ number_format($grand_total) }}</strong>
                                            </td>
                                            <td class="text-center" colspan="5">
                                                <a href="{{ route('checkout') }}"
                                                    class="btn btn-primary btn-sm">Checkout</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
