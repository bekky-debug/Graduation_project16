<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>BlockWise — Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <style>
        body {
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
    </style>
</head>

<body>

<form method="POST" action="{{ route('login') }}">
    @csrf
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    <div class="card-custom">
        <div class="login-panel row g-0 align-items-center">
            <!-- Left: form -->
            <div class="col-lg-6 px-5">
                <div class="brand">
                    <div>
                        <div style="font-size:28px; font-weight:700;">Login to <img class="img-fluid" src="img/logo2.png" alt="" style="width: 60px;"><span style="font-size:28px; font-weight:800;">BlockWise</span>
                        </div>

                    </div>
                </div>

                <!-- Email -->
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
                </div>

                <!-- Password -->
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" required>
                </div>

                <div class="remember-row">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                        <label class="form-check-label ms-2" for="rememberMe" style="font-weight:500;">Remember Me</label>
                    </div>
                    <div>
                        <a href="forget.html" class="small-link">Forgot Password?</a>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button class="btn btn-login"> Log in </button>
                </div>

                <p class="text-center" style="color:#6b7280;">
                    Don't have an account?
                    <a href="{{route('register')}}" class="small-link"> Register new</a>
                </p>
            </div>

            <!-- Right: illustration -->
            <div class="col-lg-6 illustration">
                <!-- استبدل هذا الرابط بأي صورة توضيحية تراها مناسبة -->
                <img src="{{asset('img/Group 90.png')}}" alt="illustration">
            </div>
        </div>
    </div>
</form>

<!-- Bootstrap JS (optional for interactions) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
