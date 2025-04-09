<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المنتج</title>
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
            min-height: 100vh;
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
        .container {
            max-width: 1200px;
            margin: 80px auto 30px;
            padding: 2rem;
        }

        /* Edit Card */
        .edit-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(139, 69, 19, 0.2);
            overflow: hidden;
        }

        /* Card Header */
        .card-header {
            background-color: var(--brown);
            color: var(--gold);
            padding: 1.5rem;
            text-align: center;
            border-bottom: 2px solid var(--gold);
        }

        .card-header h1 {
            margin: 0;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Card Body */
        .card-body {
            padding: 2rem;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 2.5rem;
        }

        .section-title {
            color: var(--brown);
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px dashed var(--gold);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--brown);
            font-weight: bold;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: white;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Tajawal', sans-serif;
        }

        .form-control:focus {
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Diamond Section */
        .diamond-section {
            background-color: rgba(255, 248, 220, 0.5);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
            border-right: 3px solid var(--gold);
        }

        /* Stone Entry */
        .stone-entry {
            background-color: rgba(255, 248, 220, 0.3);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            border: 1px dashed var(--gold);
        }

        .remove-stone {
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
            background-color: #dc3545;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
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

        .btn-block {
            display: block;
            width: 100%;
        }

        /* Scrollbar */
        .card-body::-webkit-scrollbar {
            width: 8px;
        }

        .card-body::-webkit-scrollbar-track {
            background: rgba(212, 175, 55, 0.1);
        }

        .card-body::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 4px;
        }

        .card-body::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .container {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .navbar {
                padding: 0.8rem 1rem;
            }
            
            .navbar h2 {
                font-size: 1.3rem;
            }
            
            .card-header h1 {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 1rem;
                margin-top: 70px;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .form-control {
                padding: 0.7rem;
            }
            
            .btn {
                padding: 0.7rem 1rem;
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
        <a href="{{ route('store_owner.products') }}">
            <i class="fas fa-arrow-left"></i> العودة للمنتجات
        </a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="edit-card">
            <div class="card-header">
                <h1><i class="fas fa-edit"></i> تعديل المنتج</h1>
            </div>
            
            <div class="card-body">
                <form action="{{ route('store_owner.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-info-circle"></i> المعلومات الأساسية</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name">اسم المنتج</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="karat">العيار</label>
                                <select id="karat" name="karat" class="form-control">
                                    <option value="">اختر العيار</option>
                                    <option value="18" {{ $product->karat === '18' ? 'selected' : '' }}>18</option>
                                    <option value="21" {{ $product->karat === '21' ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ $product->karat === '22' ? 'selected' : '' }}>22</option>
                                    <option value="24" {{ $product->karat === '24' ? 'selected' : '' }}>24</option>
                                    <option value="925" {{ $product->karat === '925' ? 'selected' : '' }}>925 (فضة)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    
                    <!-- Pricing Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-tags"></i> معلومات التسعير</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="weight">الوزن (غرام)</label>
                                <input type="number" step="0.01" id="weight" name="weight" class="form-control" value="{{ $product->weight }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="price_per_gram_syp">سعر الغرام (ل.س)</label>
                                <input type="text" inputmode="numeric" id="price_per_gram_syp" name="price_per_gram_syp" class="form-control" value="{{ number_format($product->price_per_gram_syp, 0, '', ',') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="price_per_gram_usd">سعر الغرام ($)</label>
                                <input type="text" inputmode="numeric" id="price_per_gram_usd" name="price_per_gram_usd" class="form-control" value="{{ number_format($product->price_per_gram_usd, 0, '', ',') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="crafting_fee">أجر الصياغة</label>
                                <input type="text" inputmode="numeric" id="crafting_fee" name="crafting_fee" class="form-control" value="{{ number_format($product->crafting_fee, 0, '', ',') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="total_price_syp">السعر الكلي (ل.س)</label>
                                <input type="text" inputmode="numeric" id="total_price_syp" name="total_price_syp" class="form-control" value="{{ number_format($product->total_price_syp, 0, '', ',') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="total_price_usd">السعر الكلي ($)</label>
                                <input type="text" inputmode="numeric" id="total_price_usd" name="total_price_usd" class="form-control" value="{{ number_format($product->total_price_usd, 0, '', ',') }}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Details Section -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-sliders-h"></i> تفاصيل المنتج</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="material">المادة</label>
                                <select id="material" name="material" class="form-control" disabled>
                                    <option value="gold" {{ $product->material === 'gold' ? 'selected' : '' }}>ذهب</option>
                                    <option value="silver" {{ $product->material === 'silver' ? 'selected' : '' }}>فضة</option>
                                    <option value="diamond" {{ $product->material === 'diamond' ? 'selected' : '' }}>ألماس</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="item_type">نوع المنتج</label>
                                <select id="item_type" name="item_type" class="form-control" disabled>
                                    <option value="">اختر نوع المنتج</option>
                                    <option value="ring" {{ $product->item_type === 'ring' ? 'selected' : '' }}>خاتم</option>
                                    <option value="bracelet" {{ $product->item_type === 'bracelet' ? 'selected' : '' }}>سوار</option>
                                    <option value="necklace" {{ $product->item_type === 'necklace' ? 'selected' : '' }}>قلادة</option>
                                    <option value="earring" {{ $product->item_type === 'earring' ? 'selected' : '' }}>أقراط</option>
                                    <option value="set" {{ $product->item_type === 'set' ? 'selected' : '' }}>طقم</option>
                                    <option value="coin" {{ $product->item_type === 'coin' ? 'selected' : '' }}>عملة</option>
                                    <option value="half_coin" {{ $product->item_type === 'half_coin' ? 'selected' : '' }}>نصف عملة</option>
                                    <option value="quarter_coin" {{ $product->item_type === 'quarter_coin' ? 'selected' : '' }}>ربع عملة</option>
                                </select>
                            </div>
                            
                            @if ($product->item_type === 'ring' || ($product->item_type === 'set' && in_array('ring', json_decode($product->set_items, true))))
                                <div class="form-group">
                                    <label for="ring_size">مقاس الخاتم</label>
                                    <select id="ring_size" name="ring_size" class="form-control">
                                        <option value="">اختر مقاس الخاتم</option>
                                        @for ($i = 12; $i <= 25; $i++)
                                            <option value="{{ $i }}" {{ $product->ring_size == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Diamond Details Section -->
                    @if ($product->material === 'diamond')
                    <div class="form-section diamond-section">
                        <h3 class="section-title"><i class="far fa-gem"></i> تفاصيل الأحجار</h3>
                        
                        <div id="stones-container">
                            @if ($product->stones)
                                @foreach (json_decode($product->stones, true) as $index => $stone)
                                <div class="stone-entry">
                                    <button type="button" class="remove-stone" onclick="removeStone(this)">×</button>
                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label>شكل الحجر</label>
                                            <select name="stones[{{ $index }}][stone_shape]" class="form-control">
                                                <option value="">اختر شكل الحجر</option>
                                                <option value="oval" {{ $stone['stone_shape'] === 'oval' ? 'selected' : '' }}>أوفال</option>
                                                <option value="emerald" {{ $stone['stone_shape'] === 'emerald' ? 'selected' : '' }}>ايميرولد</option>
                                                <option value="baguette" {{ $stone['stone_shape'] === 'baguette' ? 'selected' : '' }}>باغيت</option>
                                                <option value="princess" {{ $stone['stone_shape'] === 'princess' ? 'selected' : '' }}>برنسيس</option>
                                                <option value="pear" {{ $stone['stone_shape'] === 'pear' ? 'selected' : '' }}>بوار</option>
                                                <option value="trapezoid" {{ $stone['stone_shape'] === 'trapezoid' ? 'selected' : '' }}>ترابيز</option>
                                                <option value="marquise" {{ $stone['stone_shape'] === 'marquise' ? 'selected' : '' }}>ماركيز</option>
                                                <option value="round" {{ $stone['stone_shape'] === 'round' ? 'selected' : '' }}>مدور</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>نوع الحجر</label>
                                            <select name="stones[{{ $index }}][stone_type]" class="form-control">
                                                <option value="">اختر نوع الحجر</option>
                                                @foreach(['FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2', 'I1', 'I2', 'I3'] as $type)
                                                    <option value="{{ $type }}" {{ $stone['stone_type'] === $type ? 'selected' : '' }}>{{ $type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>لون الحجر</label>
                                            <select name="stones[{{ $index }}][stone_color]" class="form-control">
                                                <option value="">اختر لون الحجر</option>
                                                @foreach(range('D', 'Z') as $color)
                                                    <option value="{{ $color }}" {{ $stone['stone_color'] === $color ? 'selected' : '' }}>{{ $color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>عدد الأحجار</label>
                                            <input type="number" name="stones[{{ $index }}][stone_count]" class="form-control stone-count" value="{{ $stone['stone_count'] }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>وزن الحجر (قيراط)</label>
                                            <input type="number" step="0.01" name="stones[{{ $index }}][stone_weight]" class="form-control stone-weight" value="{{ $stone['stone_weight'] }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>سعر القيراط (ل.س)</label>
                                            <input type="text" inputmode="numeric" name="stones[{{ $index }}][carat_price_syp]" class="form-control" value="{{ number_format($stone['carat_price_syp'], 0, '', ',') }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>سعر القيراط ($)</label>
                                            <input type="text" inputmode="numeric" name="stones[{{ $index }}][carat_price_usd]" class="form-control" value="{{ number_format($stone['carat_price_usd'], 0, '', ',') }}">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="total_stone_weight">الوزن الكلي للأحجار (قيراط)</label>
                            <input type="number" step="0.01" id="total_stone_weight" name="total_stone_weight" class="form-control" value="{{ $product->total_stone_weight }}">
                        </div>
                    </div>
                    @endif
                    
                    <!-- Submit Button -->
                    <div class="form-section">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> حفظ التعديلات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // دالة تنسيق الأرقام مع الفواصل
        function formatNumber(input) {
            const caretPos = input.selectionStart;
            const originalValue = input.value;
            
            let numericValue = originalValue.replace(/[^\d.]/g, '');
            
            if(numericValue && !isNaN(numericValue)) {
                let parts = numericValue.split('.');
                let integerPart = parts[0];
                let decimalPart = parts.length > 1 ? '.' + parts[1] : '';
                
                integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                let formattedValue = integerPart + decimalPart;
                input.value = formattedValue;
                
                const commaCount = (formattedValue.match(/,/g) || []).length;
                const originalCommaCount = (originalValue.match(/,/g) || []).length;
                const diff = commaCount - originalCommaCount;
                const newCaretPos = caretPos + diff;
                
                input.setSelectionRange(newCaretPos, newCaretPos);
            }
        }

        // تهيئة حقول الأسعار
        function initPriceFields() {
            const priceFields = document.querySelectorAll(`
                #price_per_gram_syp,
                #price_per_gram_usd,
                #crafting_fee,
                #total_price_syp,
                #total_price_usd,
                input[name*="carat_price_syp"],
                input[name*="carat_price_usd"]
            `);
            
            priceFields.forEach(input => {
                input.addEventListener('input', function() {
                    formatNumber(this);
                });
                
                input.addEventListener('focus', function() {
                    this.value = this.value.replace(/,/g, '');
                });
                
                input.addEventListener('blur', function() {
                    formatNumber(this);
                });
            });
        }

        // إعداد النموذج قبل الإرسال
        function setupFormSubmission() {
            const form = document.querySelector('form');
            if(form) {
                form.addEventListener('submit', function(e) {
                    const priceFields = form.querySelectorAll(`
                        #price_per_gram_syp,
                        #price_per_gram_usd,
                        #crafting_fee,
                        #total_price_syp,
                        #total_price_usd,
                        input[name*="carat_price_syp"],
                        input[name*="carat_price_usd"]
                    `);
                    
                    priceFields.forEach(field => {
                        field.value = field.value.replace(/,/g, '');
                    });
                });
            }
        }

        // دالة إزالة الأحجار
        function removeStone(element) {
            element.closest('.stone-entry').remove();
        }

        // عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            initPriceFields();
            setupFormSubmission();
        });
    </script>
</body>
</html>