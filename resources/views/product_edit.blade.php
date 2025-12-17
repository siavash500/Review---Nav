<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
</head>
<body>

<h3>ویرایش محصول</h3>

<form method="post" action="/product/{{ $product->id }}/update">
    @csrf

    <label>نام محصول</label><br>
    <input type="text" name="product" value="{{ $product->name }}"><br><br>

    <label>قیمت</label><br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    <button type="submit">ذخیره</button>
</form>

</body>
</html>
