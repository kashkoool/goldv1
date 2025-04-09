<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>تسجيل الدخول - مجوهرات نذار</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');

        :root {
            --primary-color: #8B4513;
            --secondary-color: #D4AF37;
            --bg-color: #FFF8DC;
            --text-color: #4A4A4A;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(45deg, #FFF8DC, #FAFAD2);
            min-height: 100vh;
            direction: rtl;
        }

        .login-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-top: 5px solid var(--secondary-color);
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
        }

        .logo img {
            height: 80px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: rotate(-5deg) scale(1.05);
        }

        .form-label {
            color: var(--text-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 0.8rem 0.8rem 0.8rem 45px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            background-position: left 15px center;
            background-repeat: no-repeat;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: none;
        }

        .btn-login {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            border: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255,255,255,0.1);
            transform: rotate(30deg);
            transition: all 0.3s ease;
        }

        .btn-login:hover::after {
            left: 100%;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .remember-me input[type="checkbox"] {
            width: 1.2rem;
            height: 1.2rem;
            accent-color: var(--secondary-color);
        }

        .forgot-password {
            text-align: left;
            margin-top: 1rem;
        }

        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-password a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            right: 0;
            background-color: var(--secondary-color);
            transition: width 0.3s ease;
        }

        .forgot-password a:hover {
            color: var(--secondary-color);
        }

        .forgot-password a:hover::after {
            width: 100%;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.25rem;
            background-color: #f8d7da;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
        }

        .status-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            text-align: center;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .social-login {
            margin: 1.5rem 0;
        }

        .social-login p {
            position: relative;
            text-align: center;
            color: var(--text-color);
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: #ddd;
        }

        .social-login p::before {
            right: 0;
        }

        .social-login p::after {
            left: 0;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .facebook { background: #3b5998; }
        .google { background: #db4437; }

        .position-relative .toggle-password {
            position: absolute;
            left: 15px;
            top: 40px;
            cursor: pointer;
            color: var(--text-color);
        }

        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .login-header h1 {
                font-size: 1.5rem;
            }
            
            .form-control {
                padding: 0.7rem 0.7rem 0.7rem 40px;
            }
            
            .social-login p::before,
            .social-login p::after {
                width: 25%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="register-header">
                <!-- شعار المحل 
                <div class="logo mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="شعار مجوهرات نذار">-->
                    <!-- أو استخدام أيقونة -->
                     <i class="fas fa-gem" style="font-size: 3rem; color: var(--secondary-color);"></i> 
                </div>
                <h1>تسجيل الدخول</h1>
                <p>مرحباً بعودتك إلى مجوهرات نذار</p>
            </div>

            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input id="email" class="form-control" type="email" name="email" 
                           value="{{ old('email') }}" required autofocus autocomplete="username" />
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input id="password" class="form-control" type="password" 
                           name="password" required autocomplete="current-password" />
                    <i class="fas fa-eye toggle-password"></i>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">تذكرني</label>
                </div>

                <button type="submit" class="btn btn-login">
                    دخول
                </button>

                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                @endif

                <!-- Social Login -->
                <div class="social-login">
                    <p class="text-center">أو سجل الدخول عبر:</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon google">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </div>

                <div class="register-link">
                    <span>ليس لديك حساب؟</span>
                    <a href="{{ route('register') }}">إنشاء حساب جديد</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إظهار/إخفاء كلمة المرور
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>