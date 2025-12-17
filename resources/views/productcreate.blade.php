<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        margin: 80px auto;
        text-align: center;
    }

    h1 {
        color: #1e3a8a;
        margin-bottom: 20px;
    }

    form {
        padding: 20px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: center;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-radius: 12px;
    }

    form label {
        font-size: 16px;
        font-weight: bold;
        width: 100%;
        text-align: right;
        padding-right: 10px;
    }

    form input {
        width: 90%;
        height: 35px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    form button {
        width: 50%;
        padding: 10px;
        background: #3b82f6;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
        font-weight: bold;
    }

    form button:hover {
        background: #2563eb;
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
    {{-- name name price --}}
    <div class="container">
    <h1>افزودن محصول</h1>

    <form method="post" action="/pcreate">
        @csrf

        <label for="category">دسته‌بندی</label>
        <input type="text" name="category" id="category">

        <label for="product">محصول</label>
        <input type="text" name="product" id="product">

        <label for="price">قیمت</label>
        <input type="number" name="price" id="price">

        <button type="submit">ثبت</button>
    </form>

    <a href="/products" class="back-link">بازگشت به لیست محصولات</a>
</div>

    
</body>
</html>