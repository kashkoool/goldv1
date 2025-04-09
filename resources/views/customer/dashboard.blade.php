<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجوهرات نذار - متجر المجوهرات الفاخرة</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/customerdashboard.css') }}">

    <script>
        // إضافة تأثير التمرير للعناصر
        document.addEventListener('DOMContentLoaded', function() {
            // تأثير التمرير لشريط التنقل
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // تأثير التمرير للعناصر الأخرى (لشاشات الكبيرة فقط)
            if (window.innerWidth >= 992) {
                const scrollElements = document.querySelectorAll('.scroll-animate');

                const elementInView = (el) => {
                    const elementTop = el.getBoundingClientRect().top;
                    return elementTop <= (window.innerHeight - 100);
                };

                const displayScrollElement = (element) => {
                    element.classList.add('animated');
                };

                const handleScrollAnimation = () => {
                    scrollElements.forEach((el) => {
                        if (elementInView(el)) {
                            displayScrollElement(el);
                        }
                    });
                };

                // تحقق عند التحميل
                handleScrollAnimation();

                // تحقق أثناء التمرير
                window.addEventListener('scroll', () => {
                    handleScrollAnimation();
                });
            }
        });
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

               <h4>مجوهرات نذار</h4>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">عن المحل</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="btn btn-primary-custom">تواصل معنا</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        تسجيل الخروج
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
    <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1>اكتشف عالم المجوهرات الفاخرة</h1>
                        <p>في مجوهرات نذار نقدم لكم مجموعة مميزة من الذهب والمجوهرات التي تجمع بين الأناقة والجودة لتناسب جميع المناسبات.</p>
                        <a href="#products" class="btn btn-primary-custom">استعرض الآن</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/ديكورات-محلات-ذهب-فاخرة.jpg') }}" alt="مجوهرات نذار"  width="750px" >
                </div>
            </div>
        </div>
    </section>
     <!-- Services Section -->
     <section class="services-section" id="services">
        <div class="container">
            <div class="row text-center mb-5">
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
    <section id="products" id="products">
        <div class="container">
            <h2 class="store-header">منتجاتنا</h2>


        <!-- Products Grid -->
        <div class="products-grid">
            @forelse ($store->products as $product)
                <div class="product-card">
                    <div class="product-image-container" onclick="openProductModal({{ $product->id }})">
                        @if($product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="product-image">
                        @else
                            <img src="https://via.placeholder.com/600x400/FFFFFF/1E1E1E?text=No+Image"
                                 alt="No image available"
                                 class="product-image">
                        @endif
                    </div>
                    <div class="product-info">
                        <div class="product-header">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <button class="like-button" data-product-id="{{ $product->id }}" onclick="event.stopPropagation(); toggleLike({{ $product->id }})">
                                <i class="fas fa-heart {{ Auth::check() && $product->isLikedBy(Auth::user()) ? 'liked' : '' }}"></i>
                                <span class="like-count">{{ $product->likes()->count() }}</span>
                            </button>
                        </div>
                        <p class="product-description">{{ $product->description }}</p>
                        <div class="product-tags">
                            <span class="tag tag-gold">{{ $product->karat }}K ذهب</span>
                            <span class="tag tag-type">{{ $product->item_type }}</span>
                        </div>
                        <span class="price-tag">${{ number_format($product->total_price_usd) }}</span>
                    </div>
                </div>


            @empty
                <div class="empty-state">
                    <i class="fas fa-gem fa-3x mb-3" style="color: var(--gold);"></i>
                    <h3>لا توجد منتجات متاحة</h3>
                    <p>لا يوجد منتجات معروضة في هذا المتجر حالياً.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Product Modal -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <div class="modal-body">
            <div>
                <img id="modalMainImage" src="" alt="Product Image" class="modal-main-image">
                <div class="modal-images" id="modalThumbnails"></div>
            </div>

            <div class="modal-details">
                <div class="modal-section">
                    <h2 id="modalTitle"></h2>
                    <p id="modalDescription"></p>

                    <div class="product-tags" id="modalTags"></div>

                    <div class="price-list">
                        <div class="price-item">
                            <span class="price-label">العيار:</span>
                            <span class="price-value" id="modalKarat"></span>
                        </div>
                        <div class="price-item">
                            <span class="price-label">نوع القطعة:</span>
                            <span class="price-value" id="modalItemType"></span>
                        </div>
                        <div class="price-item">
                            <span class="price-label">السعر لكل جرام ($):</span>
                            <span class="price-value" id="modalPrice"></span>
                        </div>
                        <div class="price-item">
                            <span class="price-label">رسوم التصنيع ($):</span>
                            <span class="price-value" id="modalCraftingFee"></span>
                        </div>
                        <div class="price-item total-price">
                            <span class="price-label">السعر الإجمالي ($):</span>
                            <span class="price-value" id="modalTotalPrice"></span>
                        </div>
                    </div>
                </div>

                <!-- Add missing sections -->
                <div class="modal-section" id="modalStonesSection" style="display: none;">
                    <h3>الأحجار الكريمة</h3>
                    <div id="modalStones"></div>
                </div>

                <div class="modal-section" id="modalRingSizeSection" style="display: none;">
                    <h3>مقاس الخاتم</h3>
                    <p id="modalRingSize"></p>
                </div>

                <div class="modal-section" id="modalSetItemsSection" style="display: none;">
                    <h3>مكونات الطقم</h3>
                    <ul id="modalSetItems"></ul>
                </div>

                <!-- Add a section for comments -->
                <div class="modal-section" id="modalCommentsSection">
                    <h3>التعليقات</h3>
                    <div id="commentList"></div>
                    <!-- Add a button to trigger the nested comment modal -->
                    <button onclick="openCommentModal({{ $product->id }})" class="btn btn-primary-custom">إضافة تعليق</button>
                    <!-- New View All Comments button -->
                    <button onclick="viewAllComments()" class="btn btn-outline-primary">عرض جميع التعليقات</button>                </div>

                <!-- Add a hidden input for productId -->
                <input type="hidden" id="productId" value="">
            </div>
        </div>
    </div>
</div>

<!-- Nested Comment Modal -->
<div id="commentModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeCommentModal()">&times;</span>
        <div class="modal-body">
            <h2>إضافة تعليق</h2>
            <!-- Reuse the existing comment form -->
            <div class="comment-form-container">
                <form id="commentFormModal" action="{{ route('comment.add', ['product' => $product->id]) }}" method="POST" class="comment-form" onsubmit="return false;">
                    @csrf
                    <textarea name="comment" placeholder="أكتب تعليقك هنا..." required></textarea>
                    <button type="submit">إرسال تعليق</button>
                </form>
            </div>
        </div>
    </div>
</div>

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



<script>
     // Global variables
     let currentProduct = null;
    let currentComments = [];
    let isCommentFormListenerAttached = false;

    // Open Product Modal
    function openProductModal(productId) {
        const product = {!! $store->products->toJson() !!}.find(p => p.id === productId);

        if (!product) {
            alert('فشل في تحميل بيانات المنتج');
            return;
        }

        currentProduct = product;
        document.getElementById('productId').value = product.id;
        // Set main product info
        document.getElementById('modalTitle').textContent = product.name;
        document.getElementById('modalDescription').textContent = product.description;
        document.getElementById('modalKarat').textContent = product.karat + 'K';
        document.getElementById('modalItemType').textContent = product.item_type;
        document.getElementById('modalPrice').textContent = '$' + product.price_per_gram_usd;
        document.getElementById('modalCraftingFee').textContent = '$' + product.crafting_fee;
        document.getElementById('modalTotalPrice').textContent = '$' + product.total_price_usd;

        // Set tags
        const tagsContainer = document.getElementById('modalTags');
        tagsContainer.innerHTML = `
            <span class="tag tag-gold">${product.karat}K ذهب</span>
            <span class="tag tag-type">${product.item_type}</span>
        `;

        // Set images
        const mainImage = document.getElementById('modalMainImage');
        const thumbnailsContainer = document.getElementById('modalThumbnails');

        if (product.images && product.images.length > 0) {
            mainImage.src = `/storage/${product.images[0].image_path}`;
            thumbnailsContainer.innerHTML = '';

            product.images.forEach((image, index) => {
                const img = document.createElement('img');
                img.src = `/storage/${image.image_path}`;
                img.alt = product.name;
                img.onclick = () => {
                    mainImage.src = `/storage/${image.image_path}`;
                };
                thumbnailsContainer.appendChild(img);
            });
        } else {
            mainImage.src = 'https://via.placeholder.com/600x400/FFFFFF/1E1E1E?text=No+Image';
            thumbnailsContainer.innerHTML = '';
        }

        // Set stones if available
        const stonesSection = document.getElementById('modalStonesSection');
        const stonesContainer = document.getElementById('modalStones');

        if (stonesSection && stonesContainer) {
            if (product.stones && JSON.parse(product.stones).length > 0) {
                stonesSection.style.display = 'block';
                stonesContainer.innerHTML = '';

                JSON.parse(product.stones).forEach(stone => {
                    const stoneDiv = document.createElement('div');
                    stoneDiv.className = 'stone-details';
                    stoneDiv.innerHTML = `
                        <p><strong>النوع:</strong> ${stone.stone_type}</p>
                        <p><strong>اللون:</strong> ${stone.stone_color}</p>
                        <p><strong>العدد:</strong> ${stone.stone_count}</p>
                        <p><strong>الوزن:</strong> ${stone.stone_weight} قيراط</p>
                        <p><strong>الشكل:</strong> ${stone.stone_shape}</p>
                        <hr>
                    `;
                    stonesContainer.appendChild(stoneDiv);
                });
            } else {
                stonesSection.style.display = 'none';
            }
        }

        // Set ring size if available
        const ringSizeSection = document.getElementById('modalRingSizeSection');
        if (ringSizeSection) {
            if (product.ring_size) {
                ringSizeSection.style.display = 'block';
                document.getElementById('modalRingSize').textContent = product.ring_size;
            } else {
                ringSizeSection.style.display = 'none';
            }
        }

        // Set set items if available
        const setItemsSection = document.getElementById('modalSetItemsSection');
        const setItemsContainer = document.getElementById('modalSetItems');

        if (setItemsSection && setItemsContainer) {
            if (product.set_items && JSON.parse(product.set_items).length > 0) {
                setItemsSection.style.display = 'block';
                setItemsContainer.innerHTML = '';

                JSON.parse(product.set_items).forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    setItemsContainer.appendChild(li);
                });
            } else {
                setItemsSection.style.display = 'none';
            }
        }

         // Load comments for this product
         loadComments(productId);

// Show modal
document.getElementById('productModal').style.display = 'block';
document.body.style.overflow = 'hidden';
}

    // Close Modal
    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close Modal when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('productModal');
        if (event.target === modal) {
            closeModal();
        }
    });

    // Toggle Like
    function toggleLike(productId) {
        const likeButton = document.querySelector(`.like-button[data-product-id="${productId}"]`);
        const heartIcon = likeButton.querySelector('.fa-heart');
        const likeCount = likeButton.querySelector('.like-count');

        fetch(`/like/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                heartIcon.classList.toggle('liked', data.liked);
                likeCount.textContent = data.likeCount;

                // Add animation effect
                if (data.liked) {
                    heartIcon.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        heartIcon.style.transform = 'scale(1)';
                    }, 300);
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Load Comments
function loadComments(productId) {
    fetch(`/api/comments/${productId}`, { // Updated endpoint
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(comments => {
        currentComments = comments;
        renderComments();
    })
    .catch(error => {
        console.error('Error loading comments:', error);
        alert('حدث خطأ أثناء تحميل التعليقات');
    });
}

  // Add this function to your JavaScript code
function viewAllComments() {
    const productId = document.getElementById('productId').value;
    if (!productId) {
        alert('الرجاء فتح منتج أولاً');
        return;
    }

    // Redirect to the comments page for this product
    window.location.href = `/comments/${productId}`;
}

    // Render Comments
    function renderComments() {
        const commentList = document.getElementById('commentList');
        if (commentList) {
            commentList.innerHTML = '';

            if (currentComments.length === 0) {
                commentList.innerHTML = '<p>لا توجد تعليقات حتى الآن</p>';
                return;
            }

            currentComments.forEach(comment => {
                const commentItem = document.createElement('div');
                commentItem.className = 'comment-item';
                commentItem.innerHTML = `
                    <div class="comment-header">
                        <span class="comment-user">${comment.user.name}</span>
                        <span class="comment-time">${new Date(comment.created_at).toLocaleString()}</span>
                    </div>
                    <div class="comment-content">${comment.comment}</div>
                    ${comment.user_id === {{ Auth::id() }} ? `
                    <div class="comment-actions">
                        <button class="btn btn-danger btn-sm" onclick="deleteComment(${comment.id})">حذف</button>
                    </div>
                    ` : ''}
                `;
                commentList.appendChild(commentItem);
            });
        }
    }

    // Submit Comment
    function handleCommentSubmit(form, productId) {
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response failed');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('تم إضافة التعليق بنجاح');
                form.querySelector('textarea').value = '';
                loadComments(productId);

                // Close comment modal if it's open
                if (document.getElementById('commentModal').style.display === 'block') {
                    closeCommentModal();
                }
            } else {
                throw new Error(data.message || 'فشل في إضافة التعليق');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء إضافة التعليق: ' + error.message);
        });
    }

    // Initialize comment forms
document.addEventListener('DOMContentLoaded', function() {
    // Main page comment forms
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('action').split('/').pop();
            handleCommentSubmit(this, productId);
        });
    });

    // Modal comment form - adding a single event listener
    const commentFormModal = document.getElementById('commentFormModal');
    if (commentFormModal) {
        // Remove any existing listeners first
        const newCommentForm = commentFormModal.cloneNode(true);
        commentFormModal.parentNode.replaceChild(newCommentForm, commentFormModal);

        // Add a single listener to the new form
        newCommentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const productId = document.getElementById('productId').value;
            if (!productId) {
                alert('لا يمكن تحديد المنتج');
                return;
            }
            handleCommentSubmit(this, productId);
        });
    }
});

   // Open Comment Modal
function openCommentModal() {
    const productId = document.getElementById('productId').value;
    if (!productId) {
        alert('الرجاء فتح منتج أولاً');
        return;
    }

    const commentFormModal = document.getElementById('commentFormModal');
    // Fix: Use the correct route for comment submission
    commentFormModal.action = `/comment/${productId}`;
    commentFormModal.querySelector('textarea').value = '';
    document.getElementById('commentModal').style.display = 'block';
}

// Close Comment Modal - Fixed function
function closeCommentModal() {
    document.getElementById('commentModal').style.display = 'none';
}

    // Submit Comment - Adding a flag to prevent double submission
let isSubmitting = false;
function handleCommentSubmit(form, productId) {
    // Prevent double submission
    if (isSubmitting) return;
    isSubmitting = true;

    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        // Always treat as success - don't show error for duplicate comments
        form.querySelector('textarea').value = '';
        loadComments(productId);

        // Close comment modal if it's open
        closeCommentModal();
    })
    .catch(error => {
        console.error('Error:', error);
        // Don't show alert for errors

        // Still close the modal and clear the form
        form.querySelector('textarea').value = '';
        closeCommentModal();
    })
    .finally(() => {
        // Reset submission flag
        isSubmitting = false;
    });
}

function deleteComment(commentId) {
    // Directly proceed with deletion without confirmation
    fetch(`/comment/${commentId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Refresh comments after deletion without showing a success message
        loadComments(document.getElementById('productId').value);
    })
    .catch(error => {
        console.error('Error:', error);
        // Optionally, you can log the error or show a generic error message
    });
}
</script>


</body>
</html>