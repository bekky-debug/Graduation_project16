<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>BlockWise — Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            font-family: "Segoe UI", Roboto, "Helvetica Neue", Arial;
            padding: 40px;
        }

    </style>
</head>
<body>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="card-custom">
        <div class="register-panel row g-0 align-items-center">
            <div class="col-lg-6 px-5">
                <div class="brand mb-4">
                    <div style="font-size:28px; font-weight:700;">
                        Register to <img src="{{ asset('img/logo2.png') }}" style="width: 60px;">
                        <span style="font-weight:800;">BlockWise</span>
                    </div>
                </div>

                <div class="input-wrapper">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>

                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>

                <div class="input-wrapper">
                    <i class="fa-solid fa-phone input-icon"></i>
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-login w-100">Register</button>

                <p class="text-center mt-3">
                    Already have an account?
                    <a href="{{ route('login') }}">Log in</a>
                </p>
            </div>

            <div class="col-lg-6 illustration">
                <img src="{{ asset('img/Group 90.png') }}" alt="illustration">
            </div>
        </div>
    </div>
</form>
</body>
</html>
