<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجات المتجر</title>
    <style>
        :root {
            --brown: #8B4513;
            --gold: #D4AF37;
            --cream: #FFF8DC;
            --light-brown: #A67C52;
            --dark-brown: #5D2906;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--cream);
            color: #333;
            line-height: 1.6;
            padding-top: 70px;
        }

        /* Navbar - Brown with Gold Accents */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--brown);
            padding: 0.8rem 2rem;
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 2px solid var(--gold);
        }
        
        .navbar h2 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--gold);
            font-weight: 700;
        }
        
        .navbar a {
            color: var(--cream);
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .navbar a:hover {
            color: var(--gold);
        }

        /* Main Container */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Page Title */
        .page-title {
            color: var(--brown);
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 0.8rem;
            border-bottom: 2px dashed var(--gold);
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        /* Product Card */
        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            border: 1px solid rgba(139, 69, 19, 0.2);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.1);
        }

        .product-card h3 {
            color: var(--brown);
            font-size: 1.4rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(139, 69, 19, 0.2);
        }

        /* Product Images */
        .product-images {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .product-images img {
            max-width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid rgba(139, 69, 19, 0.2);
            flex: 1 1 100px;
            transition: transform 0.3s ease;
        }

        .product-images img:hover {
            transform: scale(1.05);
        }

        /* Product Details */
        .product-details {
            margin-top: 1rem;
            padding: 1rem;
            background-color: rgba(255, 248, 220, 0.5);
            border-radius: 8px;
            border-right: 3px solid var(--gold);
        }

        .product-details p {
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .product-details strong {
            color: var(--brown);
            display: inline-block;
            min-width: 120px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.7rem 1.2rem;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--brown);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--dark-brown);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.2);
        }

        .btn-secondary {
            background-color: white;
            color: var(--brown);
            border: 2px solid var(--brown);
        }

        .btn-secondary:hover {
            background-color: rgba(139, 69, 19, 0.05);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            justify-content: flex-end;
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 2rem;
            color: var(--brown);
        }

        /* Back Button */
        .back-button {
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main-container {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .navbar {
                padding: 0.8rem 1rem;
            }
            
            .navbar h2 {
                font-size: 1.3rem;
            }
            
            .page-title {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 1rem;
            }
            
            .product-card {
                padding: 1rem;
            }
            
            .product-card h3 {
                font-size: 1.2rem;
            }
            
            .actions {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h2><i class="fas fa-gem"></i> مجوهرات نذار</h2>
        <div class="dropdown">
           
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <div class="back-button">
            <a href="{{ route('store_owner.dashboard') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> العودة
            </a>
        </div>

        <h1 class="page-title">منتجات المتجر</h1>

        @if ($products->isEmpty())
            <div class="empty-state">
                <p>لا توجد منتجات متاحة حالياً</p>
            </div>
        @else
            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-card">
                        <h3>{{ $product->name }}</h3>

                        <!-- Product Images -->
                        @if ($product->images->isNotEmpty())
                            <div class="product-images">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة المنتج">
                                @endforeach
                            </div>
                        @else
                            <img src="https://via.placeholder.com/300x200?text=لا+يوجد+صورة" alt="لا توجد صورة" style="width:100%; margin-bottom:1rem;">
                        @endif

                        <!-- Product Details -->
                        <div class="product-details">
                            <p><strong>نوع المنتج:</strong> {{ $product->material }}</p>
                            <p><strong>نوع القطعة:</strong> {{ $product->item_type }}</p>
                            <p><strong>العيار:</strong> {{ $product->karat ?? 'N/A' }}</p>
                            <p><strong>الوزن:</strong> {{ number_format($product->weight ?? 0, 2) }} جرام</p>
                            <p><strong>السعر الكلي (ل.س):</strong> {{ number_format($product->total_price_syp ?? 0) }} ل.س</p>
                            <p><strong>السعر الكلي ($):</strong> {{ number_format($product->total_price_usd ?? 0) }} $</p>
                            
                            @if ($product->description)
                                <p><strong>الوصف:</strong> {{ $product->description }}</p>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="actions">
                            <a href="{{ route('store_owner.edit', $product->id) }}" class="btn btn-secondary">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('store_owner.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                    <i class="fas fa-trash"></i> حذف
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        // تنسيق الأرقام بفواصل
        document.addEventListener('DOMContentLoaded', function() {
            const priceElements = document.querySelectorAll('.product-details p:not(:last-child)');
            priceElements.forEach(el => {
                const text = el.textContent;
                const formatted = text.replace(/\d+/g, num => {
                    return new Intl.NumberFormat().format(num);
                });
                el.textContent = formatted;
            });
        });
    </script>
</body>
</html>