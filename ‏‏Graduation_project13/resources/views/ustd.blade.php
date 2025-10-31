@extends('app.layout')
@section('title', 'BlockWise - ustd')
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
                <img src="{{asset('img/usdt.jpg')}}" class="currency-logo-d" alt="Bitcoin">

                <h2 class="fw-bold text-primary">USDT</h2>

                <!-- About -->
                <p class="mt-3"><strong class="text-dark">About digital currency:</strong><br> USDT is short for Tether, and it is considered one of the most important stablecoins.The coin is pegged to the US Dollar at a 1:1 ratio, meaning that 1 USDT ≈ 1 USD.
                </p>

                <!-- Price -->
                <p class="fw-bold mt-3 text-dark">The price digital currency:</p>
                <div class="price-box text-dark" style="font-size: 14px;">usually around 1 USD</div>

                <!-- Video Embed -->
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/ZPSh7yQM6qI" title="USDT Tether Explained Simply" allowfullscreen>
                    </iframe>
                </div>

                <!-- Button -->
                <a href="{{ route('profile.transaction') }}" class="btn btn-custom-d mt-3">Add to wallet</a>
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
