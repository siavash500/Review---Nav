<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Menu</title>
<style>
* { box-sizing: border-box; margin:0; padding:0; }
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f2f5;
    color: #1f2937;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px 20px;
}

.container { width: 100%; max-width: 600px; }

/* پیام موفقیت */
.success-message {
    background: #d1fae5;
    border-left: 4px solid #10b981;
    padding: 12px 18px;
    border-radius: 8px;
    margin-bottom: 20px;
    color: #065f46;
    font-weight: 500;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    animation: fadeIn 0.5s ease;
}
@keyframes fadeIn { from { opacity:0; transform: translateY(-10px);} to {opacity:1; transform: translateY(0);} }

/* دسته‌بندی‌ها */
ul.categories { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:15px; }

.category {
    background:#fff;
    border-radius:10px;
    padding:15px 20px;
    cursor:pointer;
    box-shadow:0 4px 8px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.category:hover { box-shadow:0 6px 12px rgba(0,0,0,0.12); }

.category-title { font-weight:600; font-size:18px; color:#111827; display:flex; justify-content:space-between; align-items:center; }

.products {
    list-style:none;
    margin-top:10px;
    max-height:0;
    overflow:hidden;
    transition:max-height 0.4s ease;
    display:flex;
    flex-direction:column;
    gap:10px;
}

.product {
    background:#f9fafb;
    padding:10px 12px;
    border-radius:8px;
    display:flex;
    flex-direction:column;
    gap:6px;
    box-shadow:0 2px 6px rgba(0,0,0,0.05);
    transition: transform 0.2s;
}

.product:hover { transform: translateY(-1px); }

.product-name { font-weight:500; font-size:15px; }

.product-actions {
    display:flex;
    gap:8px;
}

.product-actions a,
.product-actions button {
    background:#3b82f6;
    color:#fff;
    border:none;
    padding:4px 8px;
    border-radius:6px;
    font-size:12px;
    cursor:pointer;
    text-decoration:none;
    transition: all 0.2s ease;
}

.product-actions a:hover,
.product-actions button:hover { background:#2563eb; transform: translateY(-1px); }

a.back-link {
    display:inline-block;
    margin-top:25px;
    text-decoration:none;
    color:#3b82f6;
    font-weight:600;
    transition: all 0.2s ease;
}

a.back-link:hover { color:#1d4ed8; transform: translateY(-2px); }

/* Responsive */
@media (max-width:480px) {
    .category-title { font-size:16px; }
    .product-name { font-size:14px; }
    .product-actions a, .product-actions button { padding:3px 6px; font-size:11px; }
}
</style>
</head>
<body>
<div class="container">
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <ul class="categories">
        @foreach($categories as $category)
            <li class="category">
                <div class="category-title">
                    {{ $category->name }}
                    <span class="toggle-btn">+</span>
                </div>
                <ul class="products">
                    @forelse($category->products as $product)
                        <li class="product">
                            <span class="product-name">{{ $product->name }} - {{ $product->price }} تومان</span>
                            <div class="product-actions">
                                <a href="/product/{{ $product->id }}/edit">ویرایش</a>
                                <form action="/product/{{ $product->id }}/delete" method="post" class="inline">
                                    @csrf
                                    <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="product">محصولی ندارد</li>
                    @endforelse
                </ul>
            </li>
        @endforeach
    </ul>

    <a href="/pcreate" class="back-link">بازگشت به فرم محصولات</a>
</div>

<script>
document.querySelectorAll('.category').forEach(category => {
    const btn = category.querySelector('.toggle-btn');
    const products = category.querySelector('.products');
    btn.addEventListener('click', () => {
        if(products.style.maxHeight && products.style.maxHeight !== '0px'){
            products.style.maxHeight = '0';
            btn.textContent = '+';
        } else {
            products.style.maxHeight = products.scrollHeight + 'px';
            btn.textContent = '−';
        }
    });
});
</script>
</body>
</html>
