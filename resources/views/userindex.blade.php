<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>نمایش کاربران و نظرات</title>
    <style>
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
        body { font-family: sans-serif; background: #f4f6f8; padding: 30px; }
        .user-card { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,.1); }
        .user-name { font-weight: bold; font-size: 18px; margin-bottom: 10px; }
        .review { padding: 10px; border-top: 1px solid #eee; }
        .review:first-child { border-top: none; }
        .review-comment { font-size: 14px; color: #333; }
        .review-rating { font-size: 13px; color: #555; }
    </style>
</head>
<body>

<h1>لیست کاربران و نظرات</h1>

@foreach($users as $user)
    <div class="user-card">
        <div class="user-name">{{ $user->name }} ({{ $user->email }})</div>

        @if($user->reviews->count())
        {{-- count()? نظرات رو میگیره میبینه اگر از صفر بیشتر باشن اینارو اجرا میکنه --}}
            @foreach($user->reviews as $review)
                <div class="review">
                    <div class="review-comment">{{ $review->comment }}</div>
                    <div class="review-rating">امتیاز: {{ $review->rating }}/5</div>
                </div>
            @endforeach
        @else
            <div class="review">هنوز نظری ثبت نشده</div>
        @endif
    </div>
@endforeach
<a href="/register" class="back-link">فرم پر کردن نظرات</a>
</body>
</html>
