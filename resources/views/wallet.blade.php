@extends('app.layout')
@section('title', 'BlockWise - wallet')
@section('content')

    <!-- Wallet Section -->
    <div id="Service" class="container-xxl">
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="wallet-box bg-light text-center p-4 rounded shadow-sm">
                <h2 class="mb-1">
                    <img src="{{ asset('img/wallet.png') }}" width="40" height="40"> My Wallet
                </h2>
                <p class="text-info">Manage your cryptocurrency assets</p>
                @forelse($balances as $balance)
                    @php
                        $currency = strtoupper($balance->currency);
                        $image = match($currency) {
                            'BTC' => 'coins1.png',
                            'ETH' => 'coins2.png',
                            'PALCOIN' => 'gazza.jpg',
                            default => 'coins1.png',
                        };
                    @endphp

                    <div class="balance-item d-flex align-items-center justify-content-center mb-3">
                    <span class="me-2">
                        <img src="{{ asset('img/' . $image) }}" width="50" height="50">
                    </span>
                        <strong>{{ $currency }}</strong>
                        <span class="span1 ms-2">{{ number_format($balance->total, 4) }} {{ $currency }}</span>
                    </div>
                    <hr class="w-75 mx-auto">
                @empty
                    <p class="text-muted">  There are no operations yet.  </p>
                @endforelse

                <div class="mt-4 d-flex justify-content-center gap-2">
                    <a href="{{ route('wallet.requests.create') }}">
                        <button class="btn exchange-btn text-white w-100">Request Top-up</button>
                    </a>

                    <!-- زر طلب شحن جديد -->
{{--                    <a href="{{ route('wallet.requests.create') }}">--}}
{{--                        <button class="btn btn-success w-50">Request Top-up</button>--}}
{{--                    </a>--}}
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById("aboutLink")?.addEventListener("click", function(e) {
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault();
                document.getElementById("About").scrollIntoView({ behavior: "smooth" });
            } else {
                window.location.href = "index.html#About";
            }
        });

        document.getElementById("currenciesLink")?.addEventListener("click", function(e) {
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault();
                document.getElementById("Currencies").scrollIntoView({ behavior: "smooth" });
            } else {
                window.location.href = "index.html#Currencies";
            }
        });
    </script>
@endsection
