<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>

    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f3f4f6;
        margin: 0;
        padding: 0;
        direction: rtl;
    }

    .container {
        width: 400px;
        margin: 50px auto;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category {
        background: #fff;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 12px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .category:hover {
        background: #f0f4f8;
    }

    .category-title {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 8px;
    }

    .products {
        margin-top: 8px;
        display: none;
        padding-right: 10px;
    }

    .category:hover .products {
        display: block;
    }

    .product {
        padding: 0 0;
        margin: 0 0;
        border: none;
    }

    .product:last-child {
        border-bottom: none;
    }

    .product button, .product a {
        background: #3b82f6;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        transition: background 0.3s;
        margin-left: 5px;
    }

    .product button:hover, .product a:hover {
        background: #2563eb;
    }

    form.inline {
        display: inline;
        
    }

    .success-message {
        background: #d1fae5;
        border: 1px solid #10b981;
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 15px;
        color: #065f46;
    }
    ul{
        
        display: flex;
        justify-content: space-between;
        transition: 1s;
    }
     a.back-link {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #3b82f6;
        font-weight: bold;
        transition: color 0.3s;
    }

    a.back-link:hover {
        color: #2563eb;
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

    <ul>
    @foreach($categories as $category)
        <li class="category">
            <div class="category-title">{{ $category->name }}</div>
            <ul class="products">
                @forelse($category->products as $product)
                    <li class="product">
                        {{ $product->name }} - {{ $product->price }} تومان
                        <div>
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


</body>
</html>
