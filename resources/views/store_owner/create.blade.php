<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منتج جديد</title>
    <style>
        :root {
            --brown: #8B4513;
            --gold: #D4AF37;
            --cream: #FFF8DC;
            --light-brown: #A67C52;
            --dark-brown: #5D2906;
        }

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body with Elegant Cream Background */
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
            padding: 1rem 2rem;
            color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        /* Main Content */
        .main-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Dashboard Card */
        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            border: 1px solid rgba(139, 69, 19, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .dashboard-card h1 {
            color: var(--brown);
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: 2px dashed var(--gold);
        }

        /* Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

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

        .form-group input,
        .form-group select,
        .form-group textarea {
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

        .form-group input.price-input {
            text-align: left;
            direction: ltr;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 0.5rem;
            background-color: white;
        }

        /* Stone Entry */
        .stone-entry {
            border: 1px solid rgba(139, 69, 19, 0.2);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            position: relative;
            background-color: rgba(255, 248, 220, 0.3);
        }

        .remove-stone {
            position: absolute;
            top: 0.5rem;
            left: 0.5rem;
            color: #ff4444;
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s ease;
            background: none;
            border: none;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-stone:hover {
            color: #cc0000;
        }

        .stone-fields {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        /* Buttons */
        .actions-container {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 1.8rem;
            border-radius: 6px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 180px;
            justify-content: center;
            font-size: 1rem;
            font-family: 'Tajawal', sans-serif;
        }

        .primary-btn {
            background-color: var(--brown);
            color: white;
        }

        .primary-btn:hover {
            background-color: var(--dark-brown);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.2);
        }

        .secondary-btn {
            background-color: white;
            color: var(--brown);
            border: 2px solid var(--brown);
        }

        .secondary-btn:hover {
            background-color: rgba(139, 69, 19, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main-container {
                padding: 1.5rem;
            }

            .dashboard-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0.8rem 1rem;
            }

            .navbar h2 {
                font-size: 1.3rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .stone-fields {
                grid-template-columns: 1fr;
            }

            .actions-container {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 1rem;
            }

            .dashboard-card {
                padding: 1.2rem;
            }

            .dashboard-card h1 {
                font-size: 1.6rem;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 0.7rem;
            }
        }

        /* Enhancements */
        .required-field::after {
            content: " *";
            color: #ff4444;
        }

        /* Animation for stone entry */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stone-entry {
            animation: fadeIn 0.3s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--light-brown);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-track {
            background-color: rgba(139, 69, 19, 0.1);
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tajawal Arabic font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h2><i class="fas fa-gem"></i> مجوهرات نذار</h2>
        <a href="{{ route('store_owner.products') }}">
            <i class="fas fa-arrow-right"></i> العودة إلى المنتجات
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        <div class="dashboard-card">
            <h1><i class="fas fa-plus-circle"></i> إضافة منتج جديد</h1>

            <form action="{{ route('store_owner.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="name" class="required-field"><i class="fas fa-tag"></i> اسم القطعة</label>
                        <input type="text" name="name" id="name" required>
                    </div>

                    <!-- Karat -->
                    <div class="form-group">
                        <label for="karat"><i class="fas fa-gem"></i> العيار</label>
                        <select name="karat" id="karat">
                            <option value="">اختر العيار</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="24">24</option>
                            <option value="925">925 (فضة)</option>
                        </select>
                    </div>

                    <!-- Product Material -->
                    <div class="form-group">
                        <label for="material" class="required-field"><i class="fas fa-ring"></i> صنف القطعة</label>
                        <select name="material" id="material" required>
                            <option value="gold">ذهب</option>
                            <option value="silver">فضة</option>
                            <option value="diamond">ألماس</option>
                        </select>
                    </div>

                    <!-- Product Type -->
                    <div class="form-group">
                        <label for="item_type" class="required-field"><i class="fas fa-tshirt"></i> نوع القطعة</label>
                        <select name="item_type" id="item_type" required>
                            <option value="">اختر نوع القطعة</option>
                            <option value="ring">خاتم</option>
                            <option value="bracelet">محبس</option>
                            <option value="necklace">تعليقة صدر</option>
                            <option value="earring">حلق</option>
                            <option value="set">طقم</option>
                            <option value="coin">ليرة</option>
                            <option value="half_coin">نصف ليرة</option>
                            <option value="quarter_coin">ربع ليرة</option>
                            <option value="ounce">أونصة</option>
                            <option value="anklet">خلخال</option>
                            <option value="hand_lock">محبس</option>
                            <option value="hanger">تعليقة</option>
                            <option value="name">اسم</option>
                        </select>
                    </div>

                    <!-- Weight -->
                    <div class="form-group">
                        <label for="weight"><i class="fas fa-weight-hanging"></i> الوزن</label>
                        <input type="number" step="0.01" name="weight" id="weight">
                    </div>

                    <!-- Price per Gram (SYP) -->
                    <div class="form-group">
                        <label for="price_per_gram_syp"><i class="fas fa-money-bill-wave"></i> سعر الغرام (ل.س)</label>
                        <input type="text" inputmode="numeric" name="price_per_gram_syp" id="price_per_gram_syp" class="price-input">
                    </div>

                    <!-- Price per Gram (USD) -->
                    <div class="form-group">
                        <label for="price_per_gram_usd"><i class="fas fa-dollar-sign"></i> سعر الغرام ($)</label>
                        <input type="text" inputmode="numeric" name="price_per_gram_usd" id="price_per_gram_usd" class="price-input">
                    </div>

                    <!-- Crafting Fee -->
                    <div class="form-group">
                        <label for="crafting_fee"><i class="fas fa-tools"></i> أجار الصياغة (أجار الغرام)</label>
                        <input type="text" inputmode="numeric" name="crafting_fee" id="crafting_fee" class="price-input">
                    </div>

                    <!-- Total Price (SYP) -->
                    <div class="form-group">
                        <label for="total_price_syp"><i class="fas fa-money-bill-wave"></i> السعر الكلي (ل.س)</label>
                        <input type="text" inputmode="numeric" name="total_price_syp" id="total_price_syp" class="price-input">
                    </div>

                    <!-- Total Price (USD) -->
                    <div class="form-group">
                        <label for="total_price_usd"><i class="fas fa-dollar-sign"></i> السعر الكلي ($)</label>
                        <input type="text" inputmode="numeric" name="total_price_usd" id="total_price_usd" class="price-input">
                    </div>

                    <!-- Description -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="description"><i class="fas fa-align-left"></i> تفاصيل القطعة</label>
                        <textarea name="description" id="description" rows="3"></textarea>
                    </div>

                    <!-- Diamond Details -->
                    <div id="diamond-details" style="display: none; grid-column: 1 / -1;">
                        <div class="form-group">
                            <button type="button" class="btn primary-btn" id="add-stone">
                                <i class="fas fa-plus"></i> إضافة حجر جديد
                            </button>
                        </div>
                        <div id="stones-container">
                            <!-- Initial stone entry -->
                            <div class="stone-entry">
                                <button type="button" class="remove-stone" onclick="removeStone(this)">×</button>
                                <div class="stone-fields">
                                    <div class="form-group">
                                        <label>شكل الحجر</label>
                                        <select name="stones[0][stone_shape]">
                                            <option value="">اختر شكل الحجر</option>
                                            <option value="oval">أوفال</option>
                                            <option value="emerald">ايميرولد</option>
                                            <option value="baguette">باغيت</option>
                                            <option value="princess">برنسيس</option>
                                            <option value="pear">بوار</option>
                                            <option value="trapezoid">ترابيز</option>
                                            <option value="marquise">ماركيز</option>
                                            <option value="round">مدور</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>نوع الحجر</label>
                                        <select name="stones[0][stone_type]">
                                            <option value="">اختر نوع الحجر</option>
                                            @foreach(['FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2', 'I1', 'I2', 'I3'] as $type)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>لون الحجر</label>
                                        <select name="stones[0][stone_color]">
                                            <option value="">اختر لون الحجر</option>
                                            @foreach(range('D', 'l') as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>عدد الأحجار</label>
                                        <input type="number" name="stones[0][stone_count]" class="stone-count">
                                    </div>
                                    <div class="form-group">
                                        <label>وزن الأحجار (قيراط)</label>
                                        <input type="number" step="0.01" name="stones[0][stone_weight]" class="stone-weight">
                                    </div>
                                    <div class="form-group">
                                        <label>سعر الأحجار (ل.س)</label>
                                        <input type="text" inputmode="numeric" name="stones[0][carat_price_syp]" class="price-input">
                                    </div>
                                    <div class="form-group">
                                        <label>سعر الأحجار ($)</label>
                                        <input type="text" inputmode="numeric" name="stones[0][carat_price_usd]" class="price-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Stone Weight Field -->
                        <div class="form-group">
                            <label for="total_stone_weight"><i class="fas fa-weight"></i> وزن الأحجار</label>
                            <input type="number" step="0.01" name="total_stone_weight" id="total_stone_weight">
                        </div>
                    </div>

                    <!-- Set Items (Dynamic Fields) -->
                    <div id="set-items" style="display: none; grid-column: 1 / -1;">
                        <div class="form-group">
                            <label><i class="fas fa-list"></i> ملحقات الطقم</label>
                            <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                                <div>
                                    <label>
                                        <input type="checkbox" name="set_items[]" value="ring"> خاتم
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="set_items[]" value="necklace"> حلق
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="set_items[]" value="earring"> Earring
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="set_items[]" value="bracelet"> Bracelet
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ring Sizes (Dynamic Fields) -->
                    <div id="ring-sizes" style="display: none; grid-column: 1 / -1;">
                        <div class="form-group">
                            <label for="ring_size"><i class="fas fa-ruler"></i> Ring Size</label>
                            <select name="ring_size" id="ring_size">
                                <option value="">Select Ring Size</option>
                                @for ($i = 12; $i <= 25; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Product Images -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="images"><i class="fas fa-images"></i> صور المنتج</label>
                        <input type="file" name="images[]" id="images" multiple>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="actions-container">
                    <button type="submit" class="btn primary-btn">
                        <i class="fas fa-save"></i> حفظ المنتج
                    </button>
                    <button type="reset" class="btn secondary-btn">
                        <i class="fas fa-undo"></i> إعادة تعيين
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/hide diamond details based on material selection
        const materialSelect = document.getElementById('material');
        const diamondDetails = document.getElementById('diamond-details');
        const karatSelect = document.getElementById('karat');

        materialSelect.addEventListener('change', function () {
            if (this.value === 'diamond') {
                diamondDetails.style.display = 'block';
                karatSelect.value = '18'; // Automatically set karat to 18 for diamond
                // Add required attribute to diamond fields
                document.querySelectorAll('#diamond-details select, #diamond-details input').forEach(field => {
                    field.setAttribute('required', true);
                });
            } else {
                diamondDetails.style.display = 'none';
                // Remove required attribute from diamond fields
                document.querySelectorAll('#diamond-details select, #diamond-details input').forEach(field => {
                    field.removeAttribute('required');
                });
            }
        });

        // Show/hide set items and ring sizes based on product type selection
        const itemTypeSelect = document.getElementById('item_type');
        const setItems = document.getElementById('set-items');
        const ringSizes = document.getElementById('ring-sizes');

        itemTypeSelect.addEventListener('change', function () {
            if (this.value === 'set') {
                setItems.style.display = 'block';
                ringSizes.style.display = 'none';
            } else if (this.value === 'ring') {
                setItems.style.display = 'none';
                ringSizes.style.display = 'block';
            } else {
                setItems.style.display = 'none';
                ringSizes.style.display = 'none';
            }
        });

        // Show/hide ring size when ring is selected in set items
        const ringCheckbox = document.querySelector('input[name="set_items[]"][value="ring"]');
        if (ringCheckbox) {
            ringCheckbox.addEventListener('change', function () {
                if (itemTypeSelect.value === 'set' && this.checked) {
                    ringSizes.style.display = 'block'; // Show ring size if ring is selected in set
                } else {
                    ringSizes.style.display = 'none'; // Hide ring size otherwise
                }
            });
        }

        // Automatically set Material to "Silver" when Karat is "925"
        karatSelect.addEventListener('change', function () {
            if (this.value === '925') {
                materialSelect.value = 'silver'; // Set Material to "Silver"
            }
        });

        // Stone Management
        let stoneIndex = 1;
        document.getElementById('add-stone').addEventListener('click', function() {
            const newEntry = document.createElement('div');
            newEntry.className = 'stone-entry';
            newEntry.innerHTML = `
                <button type="button" class="remove-stone" onclick="removeStone(this)">×</button>
                <div class="stone-fields">
                    <div class="form-group">
                        <label>شكل الحجر</label>
                        <select name="stones[${stoneIndex}][stone_shape]">
                            <option value="">اختر شكل الحجر</option>
                            <option value="oval">أوفال</option>
                            <option value="emerald">ايميرولد</option>
                            <option value="baguette">باغيت</option>
                            <option value="princess">برنسيس</option>
                            <option value="pear">بوار</option>
                            <option value="trapezoid">ترابيز</option>
                            <option value="marquise">ماركيز</option>
                            <option value="round">مدور</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>نوع الحجر</label>
                        <select name="stones[${stoneIndex}][stone_type]">
                            <option value="">اختر نوع الحجر</option>
                            @foreach(['FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2', 'I1', 'I2', 'I3'] as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>لون الحجر</label>
                        <select name="stones[${stoneIndex}][stone_color]">
                            <option value="">اختر لون الحجر</option>
                            @foreach(range('D', 'Z') as $color)
                                <option value="{{ $color }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>عدد الأحجار</label>
                        <input type="number" name="stones[${stoneIndex}][stone_count]" class="stone-count">
                    </div>
                    <div class="form-group">
                        <label>وزن الأحجار (قيراط)</label>
                        <input type="number" step="0.01" name="stones[${stoneIndex}][stone_weight]" class="stone-weight">
                    </div>
                    <div class="form-group">
                        <label>سعر الأحجار (ل.س)</label>
                        <input type="text" inputmode="numeric" name="stones[${stoneIndex}][carat_price_syp]" class="price-input">
                    </div>
                    <div class="form-group">
                        <label>سعر الأحجار ($)</label>
                        <input type="text" inputmode="numeric" name="stones[${stoneIndex}][carat_price_usd]" class="price-input">
                    </div>
                </div>
            `;
            document.getElementById('stones-container').appendChild(newEntry);
            stoneIndex++;
        });

        function removeStone(element) {
            element.closest('.stone-entry').remove();
        }

        // Price formatting functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Function to format number with commas
            function formatNumber(input) {
                // Save caret position
                const caretPos = input.selectionStart;
                const originalValue = input.value;

                // Remove all non-digit characters except decimal point
                let numericValue = originalValue.replace(/[^\d.]/g, '');

                // Format the number with commas
                if (numericValue && !isNaN(numericValue)) {
                    // Split into integer and decimal parts
                    let parts = numericValue.split('.');
                    let integerPart = parts[0];
                    let decimalPart = parts.length > 1 ? '.' + parts[1] : '';

                    // Add commas to integer part
                    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                    // Combine parts
                    let formattedValue = integerPart + decimalPart;

                    // Update the input value
                    input.value = formattedValue;

                    // Calculate new caret position
                    const commaCount = (formattedValue.match(/,/g) || []).length;
                    const originalCommaCount = (originalValue.match(/,/g) || []).length;
                    const diff = commaCount - originalCommaCount;
                    const newCaretPos = caretPos + diff;

                    // Restore caret position
                    input.setSelectionRange(newCaretPos, newCaretPos);
                }
            }

            // Function to remove commas before form submission
            function removeCommas(input) {
                input.value = input.value.replace(/,/g, '');
            }

            // Apply event listeners to all price inputs
            document.querySelectorAll('.price-input').forEach(input => {
                // Format on input
                input.addEventListener('input', function() {
                    formatNumber(this);
                });

                // Remove commas on focus for editing
                input.addEventListener('focus', function() {
                    this.value = this.value.replace(/,/g, '');
                });

                // Reformat on blur
                input.addEventListener('blur', function() {
                    formatNumber(this);
                });
            });

            // Remove commas before form submission
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function() {
                    document.querySelectorAll('.price-input').forEach(input => {
                        removeCommas(input);
                    });
                });
            }
        });
    </script>
</body>
</html>