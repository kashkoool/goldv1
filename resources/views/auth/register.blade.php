<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>التسجيل - مجوهرات نذار</title>
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

        .register-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border: 1px solid rgba(139, 69, 19, 0.2);
            border-top: 5px solid var(--secondary-color);
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
        }

        .logo img {
            transition: transform 0.3s ease;
            height: 80px;
            width: auto;
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

        .btn-register {
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

        .btn-register:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register::after {
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

        .btn-register:hover::after {
            left: 100%;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .login-link a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            right: 0;
            background-color: var(--secondary-color);
            transition: width 0.3s ease;
        }

        .login-link a:hover {
            color: var(--secondary-color);
        }

        .login-link a:hover::after {
            width: 100%;
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
        .twitter { background: #1da1f2; }

        .position-relative .toggle-password {
            position: absolute;
            left: 15px;
            top: 40px;
            cursor: pointer;
            color: var(--text-color);
        }

        @media (max-width: 576px) {
            .register-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .register-header h1 {
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
        <div class="register-container">
            <div class="register-header">
                <!-- شعار المحل 
                <div class="logo mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="شعار مجوهرات نذار">-->
                    <!-- أو استخدام أيقونة -->
                     <i class="fas fa-gem" style="font-size: 3rem; color: var(--secondary-color);"></i> 
                </div>
                <h1>إنشاء حساب جديد</h1>
                <p>مرحباً بك في عائلة مجوهرات نذار</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- الاسم -->
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input id="name" class="form-control" type="text" name="name" 
                           value="{{ old('name') }}" required autofocus autocomplete="name" />
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input id="email" class="form-control" type="email" name="email" 
                           value="{{ old('email') }}" required autocomplete="username" />
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- كلمة المرور -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input id="password" class="form-control" type="password" 
                           name="password" required autocomplete="new-password" />
                    <i class="fas fa-eye toggle-password"></i>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- تأكيد كلمة المرور -->
                <div class="mb-3 position-relative">
                    <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                    <input id="password_confirmation" class="form-control" type="password" 
                           name="password_confirmation" required autocomplete="new-password" />
                    <i class="fas fa-eye toggle-password"></i>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- شروط الخدمة -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        أوافق على <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">شروط الخدمة</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-register">
                    تسجيل
                </button>

                <!-- تسجيل الدخول عبر وسائل التواصل -->
                <div class="social-login">
                    <p class="text-center">أو سجل عبر:</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- رابط تسجيل الدخول -->
                <div class="login-link">
                    <span>لديك حساب بالفعل؟</span>
                    <a href="{{ route('login') }}">تسجيل الدخول</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal شروط الخدمة -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">شروط الخدمة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>1. سياسة الخصوصية</h6>
                    <p>نحن نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية وفقاً لأحكام القانون.</p>
                    
                    <h6>2. استخدام الموقع</h6>
                    <p>يجب استخدام الموقع لأغراض مشروعة فقط وعدم انتهاك أي قوانين محلية أو دولية.</p>
                    
                    <h6>3. الحسابات والمعلومات</h6>
                    <p>أنت مسؤول عن الحفاظ على سرية معلومات حسابك وكلمة المرور.</p>
                    
                    <h6>4. التعديلات</h6>
                    <p>نحتفظ بالحق في تعديل هذه الشروط في أي وقت دون إشعار مسبق.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">موافق</button>
                </div>
            </div>
        </div>
    </div>

    <!-- رسالة الترحيب بعد التسجيل -->
    @if(session('success'))
    <div class="alert-popup">
        <div class="popup-content">
            <i class="fas fa-check-circle success-icon"></i>
            <h3>مرحباً {{ session('name') }}!</h3>
            <p>تم تسجيلك بنجاح في مجوهرات نذار</p>
            <button class="btn-popup-close">متابعة</button>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إظهار/إخفاء كلمة المرور
        document.querySelectorAll('.toggle-password').forEach(function(icon) {
            icon.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // إغلاق نافذة الترحيب
        document.querySelector('.btn-popup-close')?.addEventListener('click', function() {
            document.querySelector('.alert-popup').style.display = 'none';
        });
    </script>

    <style>
        .alert-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.5s;
        }
        .popup-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            max-width: 400px;
            animation: slideUp 0.5s;
        }
        .success-icon {
            color: #28a745;
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .btn-popup-close {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.5rem 2rem;
            border-radius: 30px;
            margin-top: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-popup-close:hover {
            background: var(--primary-color);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(50px); }
            to { transform: translateY(0); }
        }
    </style>
</body>
</html>