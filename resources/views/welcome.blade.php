<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>مجوهرات نذار</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');

        :root {
            --primary-color: #8B4513;
            --secondary-color: #D4AF37;
            --bg-color: #FFF8DC;
            --text-color: #4A4A4A;
            --container-padding: 1rem;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--bg-color);
            direction: rtl;
            color: var(--text-color);
            padding-top: 80px; /* For fixed navbar */
        }

        .navbar {
            background-color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-size: 1rem;
            margin: 0 0.8rem;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link:hover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .hero-section {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            padding: 2rem 0;
            background: linear-gradient(45deg, #FFF8DC, #FAFAD2);
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1.2rem;
        }

        .hero-content p {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 1.8rem;
            color: var(--text-color);
        }

        .btn-primary-custom {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.7rem 1.8rem;
            border-radius: 30px;
            border: none;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.2);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem 0;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            margin-bottom: 2rem;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .product-details {
            padding: 1.2rem;
            background: white;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.8rem;
        }

        .price-tag {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--secondary-color);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .services-section {
            padding: 3rem 0;
            background: white;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 0;
            width: 50%;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .service-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 12px;
            background: var(--bg-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .service-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .gallery-section {
            padding: 3rem 0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            padding: 0.5rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .contact-section {
            padding: 3rem 0;
            background: linear-gradient(45deg, #FFF8DC, #FAFAD2);
            margin-top: 1rem;
        }

        .contact-info {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .contact-info h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            font-size: 1rem;
        }

        .contact-icon {
            color: var(--secondary-color);
            font-size: 1.2rem;
        }

        /* Modal Styles */
        .product-modal .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .product-modal .modal-header {
            border-bottom: none;
            padding: 1.2rem;
            background: linear-gradient(45deg, var(--bg-color), #FAFAD2);
            border-radius: 12px 12px 0 0;
        }

        .product-modal .modal-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.3rem;
        }

        .product-modal .modal-body {
            padding: 1.5rem;
        }

        .product-modal .modal-footer {
            border-top: none;
            padding: 1.2rem;
        }

        .product-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .product-info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.6rem 0;
            border-bottom: 1px solid #eee;
        }

        .product-info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--text-color);
            font-weight: 600;
        }

        .info-value {
            color: var(--primary-color);
        }

        .stones-list {
            background: var(--bg-color);
            padding: 0.8rem;
            border-radius: 8px;
            margin-top: 0.8rem;
        }

        .stone-item {
            padding: 0.4rem 0;
        }

        .modal-product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1.2rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .product-image {
                height: 220px;
            }

            .modal-product-image {
                height: 220px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }

            .navbar {
                padding: 0.8rem 0;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }

            .nav-link {
                font-size: 0.9rem;
                margin: 0 0.6rem;
            }

            .hero-section {
                min-height: auto;
                padding: 3rem 0;
            }

            .hero-content h1 {
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            .hero-content p {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .btn-primary-custom {
                padding: 0.6rem 1.5rem;
                font-size: 0.9rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.2rem;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .service-card {
                padding: 1.2rem;
            }

            .service-icon {
                font-size: 1.8rem;
            }

            .contact-info h2 {
                font-size: 1.6rem;
            }

            .contact-item {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding-top: 60px;
            }

            .navbar {
                padding: 0.5rem 0;
            }

            .hero-content h1 {
                font-size: 1.8rem;
                text-align: center;
            }

            .hero-content p {
                text-align: center;
                font-size: 0.9rem;
            }

            .hero-content .btn-primary-custom {
                margin: 0 auto;
                display: block;
                width: fit-content;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .product-image {
                height: 200px;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .service-card {
                margin-bottom: 1rem;
            }

            .contact-info {
                padding: 1rem;
            }

            .contact-info h2 {
                font-size: 1.4rem;
            }

            .contact-item {
                flex-direction: column;
                gap: 0.5rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 400px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .nav-link {
                font-size: 0.8rem;
                margin: 0 0.4rem;
            }

            .hero-content h1 {
                font-size: 1.6rem;
            }

            .btn-primary-custom {
                padding: 0.5rem 1.2rem;
                font-size: 0.85rem;
            }

            .price-tag {
                font-size: 0.8rem;
                padding: 0.3rem 0.6rem;
            }

            .product-title {
                font-size: 1.1rem;
            }
        }

        /* Landscape orientation for mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .hero-section {
                min-height: auto;
                padding: 1.5rem 0;
            }

            .hero-content h1 {
                font-size: 1.8rem;
                margin-bottom: 0.8rem;
            }

            .hero-content p {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1rem;
            }

            .product-image {
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="">
                <h3>مجوهرات نذار </h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">عن المحل</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">لوحة التحكم</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">التسجيل</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <a href="#contact" class="btn btn-primary-custom">تواصل معنا</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="hero-content">
                        <h1>اكتشف عالم المجوهرات الفاخرة</h1>
                        <p>في مجوهرات نذار نقدم لكم مجموعة مميزة من الذهب والمجوهرات التي تجمع بين الأناقة والجودة لتناسب جميع المناسبات.</p>
                        <a href="#products" class="btn btn-primary-custom">استعرض الآن</a>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                    <img src="{{ asset('images/ديكورات-محلات-ذهب-فاخرة.jpg') }}" alt="مجوهرات نذار" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h2 class="section-title">خدماتنا المميزة</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <i class="fas fa-gem service-icon"></i>
                        <h3>تصاميم فريدة</h3>
                        <p>نقدم مجوهرات مميزة بتصاميم حصرية تجمع بين الأناقة والفخامة</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <i class="fas fa-star service-icon"></i>
                        <h3>خدمة عملاء ممتازة</h3>
                        <p>نحن هنا لتلبية احتياجاتكم وضمان رضاكم الكامل عن منتجاتنا</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-card">
                        <i class="fas fa-award service-icon"></i>
                        <h3>جودة لا تضاهى</h3>
                        <p>نستخدم أفضل المواد لضمان تقديم مجوهرات تدوم لسنوات طويلة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section" id="products">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h2 class="section-title">منتجاتنا</h2>
                </div>
            </div>
            <div class="products-grid">
                @forelse ($stores as $store)
                    @forelse ($store->products as $product)
                        <div class="product-card cursor-pointer" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                            @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                     alt="{{ $product->name }}"
                                     class="product-image">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image"
                                     alt="No Image"
                                     class="product-image">
                            @endif
                            <span class="price-tag">${{ number_format($product->price_per_gram_usd) }}</span>
                            <div class="product-details">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <p>{{ Str::limit($product->description, 100) }}</p>
                            </div>
                        </div>

                        <!-- Product Modal -->
                        <div class="modal fade product-modal" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if($product->images->isNotEmpty())
                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                 alt="{{ $product->name }}"
                                                 class="modal-product-image">
                                        @endif
                                        <ul class="product-info-list">
                                            <li class="product-info-item">
                                                <span class="info-label">نوع المنتج:</span>
                                                <span class="info-value">{{ $product->material }}</span>
                                            </li>
                                            <li class="product-info-item">
                                                <span class="info-label">موديل القطعة:</span>
                                                <span class="info-value">{{ $product->item_type }}</span>
                                            </li>
                                            <li class="product-info-item">
                                                <span class="info-label">العيار:</span>
                                                <span class="info-value">{{ $product->karat ?? 'N/A' }}</span>
                                            </li>
                                            <li class="product-info-item">
                                                <span class="info-label">الوزن:</span>
                                                <span class="info-value">{{ number_format($product->weight ?? 0, 2) }} grams</span>
                                            </li>
                                            <li class="product-info-item">
                                                <span class="info-label">السعر ($):</span>
                                                <span class="info-value">${{ number_format($product->price_per_gram_usd ?? 0) }}</span>
                                            </li>
                                        </ul>
                                        <div class="mt-3">
                                            <h6>وصف المنتج:</h6>
                                            <p>{{ $product->description ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p>لا توجد منتجات متاحة حالياً</p>
                        </div>
                    @endforelse
                @empty
                    <div class="col-12 text-center py-4">
                        <p>لا توجد متاجر متاحة حالياً</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="about">
        <div class="container">
            <div class="contact-info">
                <h2>تواصل معنا</h2>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt contact-icon"></i>
                        <span>صالحية شارع الباكستان مواجه عصير أبو عبدو</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone contact-icon"></i>
                        <span>011-4437270</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt contact-icon"></i>
                        <span>0933336562</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for better mobile experience -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Close mobile menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>