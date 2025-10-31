@extends('app.layout')
@section('title', 'BlockWise - Gaza_Coin ')
@section('content')

    <div class="container-xxl">

        <!-- Details Start -->
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="text-center mb-1">
                <h2 class="mb-1"><img src="{{asset('img/detaits.jpg')}} " width="40 " height="40 " class="me-1">Currency Details</h2>
                <p class="subtitle-d">to learn and know more about digital currency</p>
            </div>

            <div class="card-custom-d">
                <!-- Logo -->
                <img src="{{asset('img/gazza.jpg')}}" class="currency-logo-d" alt="gazza">

                <h2 class="fw-bold text-primary">PalCoin</h2>

                <!-- About -->
                <p class="mt-3"><strong class="text-dark">About digital currency:</strong><br> palCoin is a local stable digital currency developed as part of our graduation project.
It aims to facilitate secure and fast financial transactions within the Gaza Strip.
Each Gaza Coin is pegged to the value of the Israeli Shekel (1 Gaza Coin = 1 ILS), ensuring stability and alignment with the local economy.

The coin is used within our platform as a payment and transfer method between users without the need for traditional banks.
It can also be exchanged for global cryptocurrencies like Bitcoin, using live price data from the CoinGecko API.

The main goal of Gaza Coin is to ease financial restrictions on Gaza, promote e-commerce, and support local digital businesses through a reliable and independent digital financial system.
                </p>

                <!-- Price -->
                <p class="fw-bold mt-3 text-dark">The price digital currency:</p>
                <div class="price-box text-dark" style="font-size: 14px;">1 Palestinian shekel</div>

                {{-- <!-- Video Embed -->
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/ZPSh7yQM6qI" title="USDT Tether Explained Simply" allowfullscreen>
                    </iframe>
                </div> --}}

                <!-- Button -->
                <a href="{{ route('wallet.requests.create') }}" class="btn btn-custom-d mt-3">Add to wallet</a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("aboutLink").addEventListener("click", function(e) {
            // لو أنا على index.html بالفعل
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault(); // منع فتح الدروب داون فقط
                document.getElementById("About").scrollIntoView({
                    behavior: "smooth"
                });
            }
            // لو أنا في صفحة ثانية
            else {
                window.location.href = "index.html#About";
            }
        });

        document.getElementById("currenciesLink").addEventListener("click", function(e) {
            // لو أنا على index.html بالفعل
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault(); // منع فتح الدروب داون فقط
                document.getElementById("Currencies").scrollIntoView({
                    behavior: "smooth"
                });
            }
            // لو أنا في صفحة ثانية
            else {
                window.location.href = "index.html#Currencies";
            }
        });
    </script>
       @endsection
