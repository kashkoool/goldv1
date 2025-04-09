<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجوهرات نذار | لوحة التحكم</title>
    <style>
        :root {
            --main-color: #8B4513; /* بني فاخر */
            --gold: #D4AF37;       /* ذهبي */
            --light: #FFF8DC;      /* كريمي فاتح */
            --dark: #2c3e50;       /* نص داكن */
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* التصميم العام */
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* شريط التنقل المعدل */
        .navbar {
            background-color: white;
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            color: var(--main-color);
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* القائمة المنسدلة المحسنة */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            background-color: var(--gold);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .dropdown-toggle:hover {
            background-color: var(--main-color);
            transform: translateY(-2px);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 220px;
            box-shadow: var(--shadow);
            border-radius: 8px;
            right: 0;
            z-index: 1;
            padding: 10px 0;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a, .logout-button {
            color: var(--dark);
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f9f9f9;
            padding-right: 25px;
            color: var(--main-color);
        }

        .logout-button {
            width: 100%;
            text-align: right;
            background: none;
            border: none;
            cursor: pointer;
            color: #e74c3c;
        }

        /* المحتوى الرئيسي */
        .container {
            max-width: 1200px;
            margin: 90px auto 30px;
            padding: 0 20px;
        }

        .profile-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .profile-image {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--gold);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        /* البطاقة الرئيسية */
        .card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            position: relative;
        }

        .card h1 {
            color: var(--main-color);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.2rem;
            position: relative;
        }

        .card h1:after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--gold);
            margin: 1rem auto;
        }

        /* أقسام المعلومات */
        .info-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #f9f9f9;
            border-radius: 8px;
            border-right: 3px solid var(--gold);
        }

        .info-section h3 {
            color: var(--main-color);
            margin-top: 0;
            padding-bottom: 0.5rem;
            border-bottom: 2px dashed var(--gold);
        }

        .info-section p {
            margin: 1rem 0;
            padding: 0.5rem;
        }

        .subscription-date {
            color: #e74c3c;
            font-weight: bold;
            background: rgba(231, 76, 60, 0.1);
            padding: 0.8rem;
            border-radius: 6px;
            display: inline-block;
        }

        /* الأزرار المحسنة */
        .btn-container {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 180px;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            flex: 1 1 auto;
            text-align: center;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--main-color);
        }

        .btn-secondary {
            background-color: var(--gold);
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* التجاوب مع الجوال */
        @media (max-width: 992px) {
            .btn {
                min-width: 160px;
                padding: 0.9rem 1.2rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .dropdown-content {
                position: fixed;
                width: 90%;
                right: 5%;
                left: 5%;
                top: 80px;
            }

            .container {
                margin-top: 80px;
                padding: 0 15px;
            }

            .card {
                padding: 1.5rem;
            }

            .profile-image {
                width: 120px;
                height: 120px;
            }

            .btn-container {
                flex-direction: row;
                gap: 1rem;
                margin-top: 2rem;
            }

            .btn {
                width: 100%;
                min-width: 100%;
                padding: 0.8rem 0.5rem;
                font-size: 0.9rem;
                gap: 6px;
            }

            .card h1 {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .btn-container {
                flex-direction: column;
                gap: 0.8rem;
                margin-top: 1.5rem;
            }

            .btn {
                width: 100%;
                padding: 0.7rem 0.5rem;
                font-size: 0.85rem;
                gap: 5px;
            }

            .card {
                padding: 1rem;
            }

            .info-section {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }

            .card h1 {
                font-size: 1.5rem;
                margin-bottom: 1.2rem;
            }

            .card h1:after {
                width: 80px;
                margin: 0.8rem auto;
            }
        }

        @media (max-width: 400px) {
            .btn {
                padding: 0.6rem 0.4rem;
                font-size: 0.8rem;
                gap: 4px;
            }

            .card h1 {
                font-size: 1.3rem;
            }

            .info-section {
                padding: 0.8rem;
            }

            .info-section h3 {
                font-size: 0.95rem;
            }

            .info-section p {
                font-size: 0.85rem;
                margin: 0.8rem 0;
            }

            .subscription-date {
                padding: 0.6rem;
                font-size: 0.85rem;
            }

            .profile-image {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 350px) {
            .btn {
                padding: 0.5rem 0.3rem;
                font-size: 0.75rem;
            }

            .card h1 {
                font-size: 1.2rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- شريط التنقل -->
    <nav class="navbar">
        <h2><i class="fas fa-gem"></i> مجوهرات نذار</h2>
        <div class="dropdown">
            <div class="dropdown-toggle">
                <i class="fas fa-user"></i> نذار
            </div>
            <div class="dropdown-content">
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- المحتوى الرئيسي -->
    <div class="container">


        <div class="card">
            <h1>مرحبًا، {{ $storeOwner->name }}</h1>

            <div class="info-section">
                <h3><i class="fas fa-user-circle"></i> معلومات الحساب</h3>
                <p><i class="fas fa-envelope"></i> {{ $storeOwner->email }}</p>
                <p><i class="fas fa-user-tag"></i> store_owner</p>
            </div>

            <div class="info-section">
                <h3><i class="fas fa-store"></i> معلومات المتجر</h3>
                <p><i class="fas fa-sign"></i> {{ $store->name }}</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ $store->location }}</p>
                <p class="subscription-date">
                    <i class="fas fa-calendar-times"></i> تاريخ انتهاء الاشتراك: 17-03-2026
                </p>
            </div>

            <div class="btn-container">
                <a href="{{ route('store_owner.products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> إضافة منتج جديد
                </a>
                <a href="{{ route('store_owner.products') }}" class="btn btn-secondary">
                    <i class="fas fa-box-open"></i> عرض المنتجات
                </a>
            </div>
        </div>
    </div>

    <script>
        // تفعيل القائمة على الجوال
        document.querySelector('.dropdown-toggle').addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const menu = document.querySelector('.dropdown-content');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            }
        });

        // إغلاق القائمة عند النقر خارجها
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 && !e.target.closest('.dropdown')) {
                document.querySelector('.dropdown-content').style.display = 'none';
            }
        });
    </script>
</body>
</html>