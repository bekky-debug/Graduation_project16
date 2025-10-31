@extends('app.layout')
@section('title', 'BlockWise - exchange')
@section('content')

    <div id="Service" class="container-xxl ">
        <div class="container py-3  wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="wallet-box bg-light text-center ">
                    <h3 class="mb-3 fw-bold"><img src="{{asset('img/image1w.png')}}" width="50" height="50"> Currency Exchange</h3>
                    <p class="text-info mb-4">Swipe your crypto instantly at the best rates.</p>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form  action="{{ route('exchange.process') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="fromCurrency" class="form-label">From</label>
                            <select class="form-select" id="fromCurrency"  name="from_currency">
                                <option selected>BTC (Bitcoin)</option>
                                <option>ETH (Ethereum)</option>
                                <option>USDT (Tether)</option>
                            </select>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="toCurrency" class="form-label">To</label>
                            <select class="form-select" id="toCurrency" name="to_currency">
                                <option selected>ETH (Ethereum)</option>
                                <option>BTC (Bitcoin)</option>
                                <option>USDT (Tether)</option>
                            </select>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="amount" class="form-label" >Amount</label>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="0.00">
                        </div>

                        <p class="rate-text mb-4">Rate: 1 BTC ~ 28.000 USDT</p>

                        <button type="submit" class="btn exchange-btn text-white w-50">Exchange Now</button>
                    </form>

                </div>
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
