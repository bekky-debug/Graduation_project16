<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title', 'BlockWise')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('style.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg  navbar-light sticky-top p-0 px-4 px-lg-5" style=" background-color: #F1FBFA;">
        <a href="{{route('profile.home')}}" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary">
                <img class="img-fluid" src="{{asset('img/logo2.png')}}" alt="" style="width: 60px;"> BlockWise
            </h2>
        </a>

        <!-- زر البرجر -->
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>

        <!-- قائمة الروابط -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="{{route('profile.home')}}" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="{{route('profile.home')}}#About" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="aboutLink">About</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="{{route('profile.faq')}}" class="dropdown-item">FAQs</a>

                    </div>
                </div>
                <a href="{{ route('profile.home') }}#whyus" class="nav-item nav-link">Features</a>
                <a href="{{route('profile.home')}}#Service" class="nav-item nav-link ">Service</a>

                <div class="nav-item dropdown">
                    <a href="{{route('profile.home')}}#Currencies" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" id="currenciesLink">Currencies</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="{{route('profile.bitcoin')}}" class="dropdown-item">Bitcoin</a>
                        <a href="{{route('profile.eth')}}" class="dropdown-item">Ethereum</a>
                        <a href="{{route('profile.USTD')}}" class="dropdown-item">USDT</a>
                    </div>
                </div>

                <a href="{{route('profile.home')}}#News" class="nav-item nav-link">News</a>
                <a href="{{route('profile.home')}}#Contact" class="nav-item nav-link">Contact</a>

                <!-- أيقونة الإعدادات -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex align-items-center" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- أيقونة تظهر فقط في الكبير -->
                        <i class="bi bi-gear d-none d-lg-inline"></i>
                        <!--  أيقونة تظهر في الموبايل -->
                        <span class="d-inline d-lg-none">
      <i class="bi bi-gear me-1"></i> Settings
    </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end shadow-sm m-0" aria-labelledby="settingsDropdown">
                        <a href="{{route('profile.edit')}}" class="dropdown-item">Edit Profile</a>
                        <form action="{{ route('logout') }}" method="POST" class="dropdown-item m-0 p-0">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger w-100 text-start">Log Out</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <script>
        document.getElementById("aboutLink").addEventListener("click", function(e) {
            // لو أنا على index.html بالفعل
           if (window.location.pathname === "/" || window.location.pathname.includes("home")) {
    e.preventDefault();
    document.getElementById("About").scrollIntoView({ behavior: "smooth" });
} else {
    window.location.href = "{{ route('profile.home') }}#About";
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
    <footer class="pt-5 pb-3 " style="color: #000000; background-color: #F1FBFA; ">
        <div class="container ">
            <div class="row ">

                <!-- Logo & Description -->
                <div class="col-md-5 mb-4 ms-md-5">
                    <a href="index.html">
                        <h4 class="fw-bold text-info"><span><img src="{{asset('img/logo2.png')}}" width="50" height="50"></span>BlockWise</h4>
                    </a>
                    <p class="text-muted">Stay updated with the latest in <br> cryptocurrency and blockchain.</p>

                </div>

                <!-- Quick Links -->
                <div class="col-md-3 mb-4 text-dark ">
                    <h5 class="fw-semibold ">Quick Links</h5>
                    <ul class="list-unstyled ">
                        <li><a href="{{route('profile.home')}}" class="text-muted text-decoration-none ">Home</a></li>
                        <li><a href="{{route('profile.home')}}#About" class="text-muted text-decoration-none ">About</a></li>
                        <li><a href="{{route('profile.home')}}#whyus" class="text-muted text-decoration-none ">Features</a></li>
                        <li><a href="{{route('profile.home')}}#Service" class="text-muted text-decoration-none ">Services</a></li>
                        <li><a href="{{route('profile.home')}}#Currencies" class="text-muted text-decoration-none ">Currencies</a></li>
                        <li><a href="{{route('profile.home')}}#News" class="text-muted text-decoration-none ">News</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div class="col-md-3 mb-4 text-dark ">
                    <h5 class="fw-semibold ">Support</h5>
                    <ul class="list-unstyled ">
                        <li><a href="{{route('profile.faq')}}" class="text-muted text-decoration-none ">FAQ</a></li>
                        <li><a href="{{route('profile.home')}}#Contact" class="text-muted text-decoration-none ">Contact</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Section -->
            <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-3 " style="color: #f8f9fa; ">
                <p class="mb-0 text-muted ">© 2024 BlockWise. All rights reserved.</p>
                <div>
                    <a href="https://www.facebook.com/?locale=ar_AR " class="text-info me-3 " style="font-size: 25px; "><i class="bi bi-facebook "></i></a>
                    <a href="https://www.instagram.com/ " class="text-info me-3 " style="font-size: 25px; "><i class="bi bi-instagram "></i></a>
                    <a href="https://github.com/ " class="text-info " style="font-size: 25px; "><i class="bi bi-github "></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('main.js') }}"></script>
</body>

</html>
