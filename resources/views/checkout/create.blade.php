@extends('layouts.app')

@section('content')
<section class="checkout">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    YOUR FUTURE CAREER
                </p>
                <h2 class="primary-header">
                    Start Invest Today
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="item-bootcamp">
                            <img src="{{ asset('images/item_bootcamp.png') }}" alt="" class="cover">
                            <h1 class="package text-uppercase">
                                {{ $camp->title }}
                            </h1>
                            <p class="description">
                                Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('checkout.store', $camp->id) }}" class="basic-form" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Full Name</label>
                                <input name="name" type="text" class="form-control{{ $errors->has("name") ? " is-invalid" : "" }}" value="{{ Auth::user()->name; }}" required/>
                                @if ($errors->has("name"))
                                    <span class="text-danger">{{ $errors->first("name") }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email Address</label>
                                <input name="email" type="email" class="form-control{{ $errors->has("email") ? " is-invalid" : "" }}" value="{{ Auth::user()->email; }}" required/>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            <div class="mb-4">
                                <label class="form-label">Occupation</label>
                                <input name="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" value="{{ old("occupation") ? : Auth::user()->occupation; }}" required/>
                                @error('occupation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Card Number</label>
                                <input name="card_number" type="number" class="form-control @error("card_number") is-invalid @enderror" value="{{ old("card_number") }}" required/>
                                @error('card_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">Expired</label>
                                        <input name="expired" type="month" class="form-control @error("expired") is-invalid @enderror" required/>
                                        @error('expired')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label class="form-label">CVC</label>
                                        <input name="cvc" type="number" maxlength="3" class="form-control @error("cvc") is-invalid @enderror" value="{{ old("cvc") }}" required/>
                                        @error('cvc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                            <p class="text-center subheader mt-4">
                                <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure and encrypted.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
