@extends('app.layout')
@section('content')
    <div class="container-xxl">

        <!-- Details Start -->
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="text-center mb-1">
                <h2 class="mb-1"><img src="img/detaits.jpg " width="40 " height="40 " class="me-1">Currency Details</h2>
                <p class="subtitle-d">to learn and know more about digital currency</p>
            </div>

            <div class="card-custom-d">
                <!-- Logo -->
                <img src="img/bit.jpg" class="currency-logo-d" alt="Bitcoin">

                <h2 class="fw-bold text-primary">Bitcoin</h2>

                <!-- About -->
                <p class="mt-3"><strong class="text-dark">About digital currency:</strong><br> The Bitcoin is the first and most popular cryptocurrency, created in 2009 by an unknown person or group known as Satoshi Nakamoto.
                </p>

                <!-- Price -->
                <p class="fw-bold mt-3 text-dark">The price digital currency:</p>
                <div class="price-box text-dark">112,252$</div>

                <!-- Video Embed -->
                <div class="video-box mt-3">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/SSo_EIwHSd4" title="Bitcoin Video" allowfullscreen>
          </iframe>
                    </div>
                </div>

                <!-- Button -->
                <button class="btn btn-custom-d mt-3">Add to wallet</button>
            </div>
        </div>
    </div>
    @endsection