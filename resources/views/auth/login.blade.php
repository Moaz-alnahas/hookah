<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #5724ceff;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background-color: #000;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
        }
        .login-logo img {
            max-width: 120px;
            margin-bottom: 1.5rem;
        }
        .form-control {
            margin-bottom: 1rem;
            padding: 0.75rem;
            background-color: #222;
            color: #fff;
            border: 1px solid #444;
        }
        .form-control::placeholder { color: #aaa; }
        button[type="submit"] {
            background-color: #5724ceff;
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
            width: 100%;
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #fff;
            color: black;
        }
        h4 { color: #fff; }
        label { color: #fff; }
        .error-message {
            color: #ff6b6b;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        /* إزالة تأثير autofill في Chrome */
 /* Autofill Chrome */
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 1000px #222 inset !important;
    -webkit-text-fill-color: #ddd !important;
    caret-color: #ddd;
    transition: background-color 5000s ease-in-out 0s !important;
}
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('assets/images/app_icon1.png') }}" alt="لوغو الموقع">
    </div>

    <h4 class="mb-4">تسجيل الدخول</h4>



    <form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required autocomplete="new-email">
    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required autocomplete="new-password">

    @if($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
    @endif
    <button type="submit">دخول</button>
    <div class="mt-3">
        <a href="{{ route('register') }}" 
           style="color: #fff; text-decoration: none; display: inline-block; padding: 0.5rem 0; transition: color 0.3s; ">
            إنشاء حساب جديد
        </a>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
