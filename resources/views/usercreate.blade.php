<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت کاربر و نظر</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f8; padding: 30px; }
        form { background: #fff; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 4px 10px rgba(0,0,0,.1); }
        input, textarea, select { width: 100%; padding: 8px 10px; margin-bottom: 12px; border-radius: 6px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #2563eb; color: #fff; border: none; border-radius: 6px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .success { background: #d1fae5; padding: 10px; margin-bottom: 12px; border-radius: 6px; color: #065f46; }
    </style>
</head>
<body>

<form action="/register" method="POST">
    @csrf

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <input type="text" name="name" placeholder="نام خود را وارد کنید" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}">
    
    <textarea name="comment" placeholder="نظر خود را وارد کنید">{{ old('comment') }}</textarea>
    
    <select name="rating">
        <option value="">امتیاز دهید</option>
        @for($i=1; $i<=5; $i++)
            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>

    <button type="submit">ثبت</button>
</form>

</body>
</html>
