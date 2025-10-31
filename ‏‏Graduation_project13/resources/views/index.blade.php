@extends('app.layout')
@section('title', 'BlockWise ')
@section('content')
<!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Make Better Life With Trusted BlockWise</h1>
                    <p class="animated slideInDown">Empowering your financial future with <br>secure and smart crypto solutions. Join<br> the revolution today.</p>
                    <a href="#Contact" class="btn btn-primary py-3 px-4 animated slideInDown">Contact Us</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{asset('img/hero-1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- About Start -->

    <div id="About" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{asset('img/about.png')}}" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">About Us</h1>
                        <p class="text-primary fs-5 mb-4">The Most Trusted Cryptocurrency Platform</p>
                        <p>We are a leading cryptocurrency platform dedicated to providing users with a secure and seamless environment to manage and invest in digital assets.
                        </p>
                        <p class="mb-4">Our mission is to empower everyone to explore the world of cryptocurrencies with confidence, offering the educational resources and tools needed to make informed investment decisions.</p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Fully secure and encrypted platform to protect your assets.</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>User-friendly interface for beginners and experienced traders alike.</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Continuous updates on the latest trends and developments in the crypto market.</span>
                        </div>
                        <a class="btn btn-primary py-3 px-4" href="{{route('profile.faq')}}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid mb-4" src="{{asset('img/icon-9.png')}}" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Today Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid mb-4" src="{{asset('img/icon-10.png')}}" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Monthly Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid mb-4" src="{{asset('img/icon-2.png')}}" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Total Transactions</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->

    <div id="whyus" class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Why Us!</h1>
                <p class="text-primary fs-5 mb-5">The Best In The crypto Industry</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-7.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Easy To Start</h5>
                            <span>Start your crypto journey in minutes with our simple and user-friendly platform</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-6.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Safe & Secure</h5>
                            <span>Your funds and data are protected with top-level encryption and advanced security measures.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-5.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Affordable Plans</h5>
                            <span>Choose from flexible and cost-effective plans that suit every investor’s needs</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-4.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Secure Storage</h5>
                            <span>Keep your cryptocurrencies safe with our highly secure digital wallets and storage solutions.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-3.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Protected By Insurance</h5>
                            <span>Your assets are safeguarded with insurance coverage for added peace of mind.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="{{asset('img/icon-8.png')}}" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">24/7 Support</h5>
                            <span>Our dedicated team is available around the clock to assist you with any questions or issues</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start -->

    <div id="Service" class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Services</h1>
                <p class="text-primary fs-5 mb-5">Buy And Exchange Cryptocurrency</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="{{asset('img/icon-7.png')}}" alt="">
                        <h5 class="mb-3">Currency Wallet</h5>
                        <p>Manage, send, and receive multiple cryptocurrencies easily and securely in one digital wallet.
                        </p>
                        <a href="{{route('profile.wallet')}}">View Service <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="{{asset('img/icon-3.png')}}" alt="">
                        <h5 class="mb-3">Currency Transaction</h5>
                        <p>Send and receive cryptocurrencies instantly with fast, secure, and transparent transactions.
                        </p>
                        <a href="{{route('profile.transaction')}}">View Service <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="{{asset('img/icon-5.png')}}" alt="">
                        <h5 class="mb-3">Currency Exchange</h5>
                        <p>Easily convert between different cryptocurrencies with competitive rates and low fees
                        </p>
                        <a href="{{route('profile.exchange')}}">View Service <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <!--Currencies Start-->

    <div id="Currencies" class="container-xxl  py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Popular Currencies</h1>
                <p class="text-primary fs-5 mb-5">Stay ahead of the market by tracking the most popular cryptocurrencies.</p>
            </div>

            <div class="row g-4">
                <!-- Bitcoin -->

                <div class="col-md-4 wow fadeInUp">
                    <div class="currency-card">
                        <div class="currency-icon"><img src="{{asset('img/bitcoinn.png')}}" alt=""></div>
                        <h5 class="fw-bold text-primary">Bitcoin</h5>
                        <p class="text-muted">BTC</p>
                        <h4 class="fw-bold">$29,450.00</h4>
                        <p class="text-success">+2.30% Today</p>
                        <div class="chart-container  d-flex justify-content-center align-items-center">
                            <canvas id="chartBTC"></canvas>
                        </div>
                        <a href="{{route('profile.bitcoin')}}" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </div>

                <!-- Ethereum -->

                <div class="col-md-4 wow fadeInUp">
                    <div class="currency-card">
                        <div class="currency-icon"><img src="{{asset('img/eth2.png')}}" alt=""></div>
                        <h5 class="fw-bold text-primary">Ethereum</h5>
                        <p class="text-muted">ETH</p>
                        <h4 class="fw-bold">$1,950.23</h4>
                        <p class="text-success">+1.80% Today</p>
                        <div class="chart-container  d-flex justify-content-center align-items-center">
                            <canvas id="chartETH"></canvas>
                        </div>
                        <a href="{{route('profile.eth')}}" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </div>

                <!-- USDT -->

                <div class="col-md-4 wow fadeInUp">
                    <div class="currency-card">
                        <div class="currency-icon"><img src="{{asset('img/usdt2 (1).png')}}" alt=""></div>
                        <h5 class="fw-bold text-primary">USDT</h5>
                        <p class="text-muted">USDT</p>
                        <h4 class="fw-bold">$0.5432</h4>
                        <p class="text-success">+4.20% Today</p>
                        <div class="d-flex justify-content-center align-items-center chart-container">
                            <canvas id="chartUSDT"></canvas>
                        </div>
                        <a href="{{route('profile.USTD')}}" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // بيانات تجريبية
        const createChart = (id, color, data) => {
            new Chart(document.getElementById(id), {
                type: 'line',
                data: {
                    labels: Array(data.length).fill(""),
                    datasets: [{
                        data: data,
                        borderColor: color,
                        backgroundColor: "transparent",
                        borderWidth: 2,
                        tension: 0.4,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    }
                }
            });
        };

        createChart("chartBTC", "#f7931a", [29000, 29200, 29150, 29300, 29450]);
        createChart("chartETH", "#3c3c94", [1950, 1960, 1940, 1955, 1965]);
        createChart("chartUSDT", "#26a17b", [0.54, 0.55, 0.545, 0.543, 0.544]);
    </script>
    <script>
        document.getElementById("aboutLink").addEventListener("click", function(e) {
            // إذا ضغط على الرابط
            window.location.hash = "About"; // ينزل للقسم
        });
        document.getElementById("currenciesLink").addEventListener("click", function(e) {
            // إذا ضغط على الرابط
            window.location.hash = "Currencies"; // ينزل للقسم
        });
    </script>
    <!--Currencies End-->

    <!-- News Start -->
    <div id="News" class="container-xxl bg-light py-2 my-5 ">
        <div class="container py-4  wow fadeInUp">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Latest News</h1>
                <p class="text-primary fs-5">Stay ahead of the market by tracking the most popular cryptocurrencies.</p>

            </div>
            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="container px-5">
                    <div class="carousel-inner px-5 wow fadeInUp">

                        <!-- Slide 1 -->
                        <div class="carousel-item  active ">
                            <div class="row g-0 align-items-center">
                                <!-- Text -->
                                <div class="col-md-6 d-flex flex-column justify-content-center p-5 bg-light">
                                    <p class="text-muted mb-1">April 2, 2024</p>
                                    <h2 class="fw-bold">Top Crypto Regulator Adrienne Harris Exits Key Financial Post After Four Years</h2>
                                    <p class="text-muted">Adrienne Harris will step down as superintendent of the New York Department of Financial Services, ending a four-year tenure that placed her at the center of Wall Street oversight and US crypto regulation</p>
                                    <a href="https://cryptonews.com/news/crypto-regulator-adrienne-harris-exits-nydfs-post-4-years/" class="btn btn-primary btn-news mt-3">Read More</a>
                                </div>
                                <!-- Image -->
                                <div class="col-md-6">
                                    <img src="{{asset('img/news1.jpg')}}" class="img-fluid w-100 h-100" alt="Finance">
                                </div>
                            </div>
                        </div>


                        <!-- Slide 2 -->
                        <div class="carousel-item ">
                            <div class="row g-0 align-items-center">
                                <!-- Image -->
                                <div class="col-md-6">
                                    <img src="{{asset('img/news2.webp')}}" class="img-fluid w-100 h-100" alt="Ethereum">
                                </div>
                                <!-- Text -->
                                <div class="col-md-6 d-flex flex-column justify-content-center p-5 bg-light">
                                    <p class="text-muted mb-1">April 10, 2024</p>
                                    <h2 class="fw-bold">Q&A with Reeve Collins: Future-proofing stablecoins via STBL, zero-knowledge and mintable money</h2>
                                    <p class="text-muted">A new project by Tether co-founder Reeve Collins has recently listed on major exchanges including Binance Alpha</p>
                                    <a href="https://crypto.news/qa-with-reeve-collins-future-proofing-stablecoins-via-stbl-zero-knowledge-and-mintable-money/" class="btn btn-primary btn-news mt-3">Read More</a>
                                </div>

                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item ">
                            <div class="row g-0 align-items-center">

                                <!-- Text -->
                                <div class="col-md-6 d-flex flex-column justify-content-center p-5 bg-light">
                                    <p class="text-muted mb-1">April 18, 2024</p>
                                    <h2 class="fw-bold">Chinese National Pleads Guilty in World’s Largest $6.7B Crypto Seizure Case</h2>
                                    <p class="text-muted">Qian masterminded a large-scale investment scam in China between 2014 and 2017, targeting over 128,000 victims.</p>
                                    <a href="https://cryptonews.com/news/chinese-national-pleads-guilty-in-worlds-largest-6-7b-crypto-seizure-case/" class="btn btn-primary btn-news mt-3">Read More</a>

                                </div>
                                <!-- Image -->
                                <div class="col-md-6">
                                    <img src="{{asset('img/news3.jpg')}}" class="img-fluid w-100 h-100" alt="Bitcoin">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
            </div>

        </div>
    </div>
    <!-- News End -->

<!-- Contact Start -->
<div id="Contact" class="container-xxl py-4 my-4">
    <div class="container wow fadeInUp py-2">
        <div class="row justify-content-center">
            <!-- العنوان -->
            <div class="col-12 text-center mb-4">
                <h1 class="display-6">Contact Us</h1>
                <p class="text-primary fs-5">Get in touch with us for any questions or inquiries.</p>
            </div>

            <!-- معلومات التواصل -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center mb-4">
                <img src="{{ asset('img/contactimg.png') }}" alt="contact" class="img-fluid mb-3" style="max-height: 280px;">
                <div class="contact-info text-start">
                    <h4 class="text-primary">Contact Information</h4>
                    <p><i class="bi bi-telephone-fill contact-icon"></i> +1 (234) 567-890</p>
                    <p><i class="bi bi-envelope-fill contact-icon"></i> info@example.com</p>
                    <p><i class="bi bi-geo-alt-fill contact-icon"></i> 123 Example St, City, State 12345</p>
                </div>
            </div>

            <!-- نموذج التواصل -->
            <div class="col-md-6 mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-primary">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Type your message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>

                @if(session('success'))
                    <script>
                        alert('{{ session('success') }}');
                    </script>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


   @endsection
