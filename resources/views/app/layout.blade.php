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
                <a href="{{route('profile.home')}}" class="nav-item nav-link " id="navHome">Home</a>
                <div class="nav-item dropdown">
                    <a href="{{route('profile.home')}}#About" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="navAbout">About</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="{{route('profile.faq')}}" class="dropdown-item">FAQs</a>

                    </div>
                </div>
                <a href="{{ route('profile.home') }}#whyus" class="nav-item nav-link" id="navWhyus">Features</a>
                <a href="{{route('profile.home')}}#Service" class="nav-item nav-link " id="navService">Service</a>

                <div class="nav-item dropdown">
                    <a href="{{route('profile.home')}}#Currencies" class="nav-link dropdown-toggle " data-bs-toggle="dropdown" id="navCurrencies">Currencies</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="{{route('profile.bitcoin')}}" class="dropdown-item">Bitcoin</a>
                        <a href="{{route('profile.eth')}}" class="dropdown-item">Ethereum</a>
                        <a href="{{route('profile.USTD')}}" class="dropdown-item">PalCoin</a>
                    </div>
                </div>

                <a href="{{route('profile.home')}}#News" class="nav-item nav-link" id="navNews">News</a>
                <a href="{{route('profile.home')}}#Contact" class="nav-item nav-link" id="navContact">Contact</a>

                <!-- أيقونة الإعدادات -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- أيقونة تظهر فقط في الكبير -->
                        <i class="bi bi-gear d-none d-lg-inline"></i>
                        <!-- أيقونة تظهر في الموبايل -->
                        <span class="d-inline d-lg-none">
            <i class="bi bi-gear me-1"></i> Settings
        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end shadow-sm m-0" aria-labelledby="settingsDropdown">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profile</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbarCollapse = document.querySelector('.navbar-collapse');

            // نغلق القائمة فقط إذا الرابط ليس داخل dropdown أو هو زر dropdown
            document.querySelectorAll('.navbar-collapse .nav-link').forEach(function (link) {
                link.addEventListener('click', function () {
                    const isDropdownItem = link.closest('.dropdown-menu');
                    const isDropdownToggle = link.classList.contains('dropdown-toggle');

                    if (isDropdownItem || isDropdownToggle) return;

                    if (navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse).hide();
                    }
                });
            });

            // نغلق القائمة بعد اختيار عنصر فعلي من داخل أي dropdown-menu
            document.querySelectorAll('.dropdown-menu .dropdown-item, .dropdown-menu form button').forEach(function (item) {
                item.addEventListener('click', function () {
                    setTimeout(() => {
                        if (navbarCollapse.classList.contains('show')) {
                            new bootstrap.Collapse(navbarCollapse).hide();
                        }
                    }, 300); // تأخير بسيط يسمح بالتفاعل
                });
            });
        });
    </script>





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
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.navbar-nav a.nav-link, .navbar-nav .dropdown-toggle');
            // نأخذ كل الأقسام التي لها id (عنصر قابل للتمرير)
            const sections = Array.from(document.querySelectorAll('[id]'))
                // استبعد العناصر الصغيرة غير المقصودة داخل الـ navbar/footer إن رغبتِ
                .filter(s => s.id && s.offsetHeight > 50);

            // helper: يحصل الـ id من href إن كان يحتوي #
            function getHashFromLink(link) {
                try {
                    const url = new URL(link.href, window.location.origin);
                    return url.hash ? url.hash.replace('#', '') : null;
                } catch (e) {
                    // fallback
                    return link.getAttribute('href') && link.getAttribute('href').includes('#')
                        ? link.getAttribute('href').split('#')[1]
                        : null;
                }
            }

            // إزالة الactive من كل الروابط
            function clearActive() {
                navLinks.forEach(l => l.classList.remove('active'));
            }

            // إضافة active على الرابط (أو على رابط الـ dropdown toggle الذي يقابله)
            function setActiveById(id) {
                clearActive();
                if (!id) return;

                navLinks.forEach(link => {
                    const target = getHashFromLink(link);
                    if (target === id) {
                        link.classList.add('active');
                        // لو الرابط داخل dropdown، ضع active أيضاً على الـ parent toggle إن وُجد
                        const dropdown = link.closest('.dropdown-menu');
                        if (dropdown) {
                            const toggle = dropdown.previousElementSibling;
                            if (toggle && toggle.classList.contains('dropdown-toggle')) {
                                toggle.classList.add('active');
                            }
                        }
                    }
                });
            }

            // دالة تُعيد القسم الحالي الظاهر على الشاشة بحسب scroll
            function getCurrentSectionId() {
                const scrollPos = window.scrollY + 120; // تعديل حسب ارتفاع الـ navbar
                let currentId = null;
                for (let i = 0; i < sections.length; i++) {
                    const sec = sections[i];
                    const top = sec.offsetTop;
                    const bottom = top + sec.offsetHeight;
                    if (scrollPos >= top && scrollPos < bottom) {
                        currentId = sec.id;
                        break;
                    }
                }
                return currentId;
            }

            // عند التمرير نحدّث الرابط النشط
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    window.requestAnimationFrame(function () {
                        const id = getCurrentSectionId();
                        setActiveById(id);
                        ticking = false;
                    });
                    ticking = true;
                }
            });

            // عند التحميل أيضاً نشغّل حتى يكون الـ active صحيح من البداية
            const initialId = getCurrentSectionId();
            if (initialId) setActiveById(initialId);

            // سلوك النقر: لو الرابط يحتوي # حاول نعمل scroll سهل بدل الانتقال الكامل
            navLinks.forEach(link => {
                const hash = getHashFromLink(link);
                if (hash) {
                    link.addEventListener('click', function (e) {
                        // لو الرابط يذهب لنفس الصفحة
                        const targetEl = document.getElementById(hash);
                        if (targetEl) {
                            e.preventDefault();
                            const y = targetEl.getBoundingClientRect().top + window.scrollY - 90; // فاصل عن الـ navbar
                            window.scrollTo({ top: y, behavior: 'smooth' });
                            // ضع active فوراً للمظهر الجمالي
                            setActiveById(hash);
                            // حدث focus للعنصر لو حابة للوصول عبر لوحة المفاتيح
                            targetEl.setAttribute('tabindex', '-1');
                            targetEl.focus({ preventScroll: true });
                        } else {
                            // لو العنصر غير موجود (ربما في صفحة مختلفة) فاسمحي الرابط الافتراضي بالعمل
                        }
                    });
                }
            });

            // لو أردتي: عند تغيير المسار (مثلاً جيتي من صفحة أخرى مع #fragment) نضبط الـ active
            window.addEventListener('hashchange', function () {
                const hash = location.hash.replace('#','');
                setActiveById(hash);
            });
        });
    </script>


</body>

</html>
