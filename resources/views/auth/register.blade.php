<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب جديد</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #5724ceff;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
    }
    .register-container {
        max-width: 450px;
        margin: 60px auto;
        background-color: #000;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
    }
    .register-logo img {
        max-width: 120px;
        margin-bottom: 1.5rem;
    }

    /* Labels */
    label {
        color: #fff;
        float: right;
        display: block;
        margin-bottom: 0.5rem; /* المسافة بين الاسم والحقل */
    }

    /* Inputs */
    .form-control {
        margin-bottom: 1rem;   /* المسافة تحت الحقل */
        padding: 0.75rem;
        background-color: #222 !important;
        color: #ddd !important;
        border: 1px solid #222;
    }
    .form-control::placeholder {
        color: #aaa;
    }
    .form-control:focus {
        background-color: #222 !important;
        color: #ddd !important;
        border-color: #444;
        box-shadow: none;
    }

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

    /* زر التسجيل */
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
        background-color: #6d3dff;
    }

    /* العناوين والأخطاء */
    h4 {
        color: #fff;
        margin-bottom: 1.5rem;
    }
    .error {
        color: #ff6b6b;
        font-size: 0.9rem;
        display: block;
        text-align: right;
    }
    </style>
</head>
<body>

    <div class="register-container">
        <!-- Logo -->
        <div class="register-logo">
            <img src="{{ asset('assets/images/app_icon1.png') }}" alt="لوغو الموقع">
        </div>

        <h4>إنشاء حساب جديد</h4>

        <form method="POST" action="{{ route('register') }}" autocomplete="off">
    @csrf

    <label>الاسم:</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="الاسم" required autocomplete="off">
    @error('name') <span class="error">{{ $message }}</span> @enderror

    <label>الهاتف:</label>
    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="رقم الهاتف" required autocomplete="off">
    @error('phone') <span class="error">{{ $message }}</span> @enderror

    <label>البريد الإلكتروني:</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="البريد الإلكتروني" required autocomplete="off">
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <label>كلمة المرور:</label>
    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required autocomplete="new-password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <label>تأكيد كلمة المرور:</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور" required autocomplete="new-password">

    <button type="submit">تسجيل</button>
        <div class="mt-3">
        <a href="{{ route('login') }}" 
           style="color: #fff; text-decoration: none; display: inline-block; padding: 0.5rem 0; transition: color 0.3s; ">
            تسجيل دخول
        </a>
    </div>
</form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
