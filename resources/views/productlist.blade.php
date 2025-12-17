<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>

    <style>
        body{
            font-family: sans-serif;
            background: #f3f4f6;
        }

        .container{
            width: 300px;
            margin: 50px auto;
        }

        ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category{
            background: #fff;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            cursor: pointer;
        }

        .products{
            display: none;
            margin-top: 8px;
            padding-right: 15px;
        }

        .category:hover .products{
            display: block;
        }

        .product{
            font-size: 14px;
            padding: 4px 0;
            color: #555;
            display: flex;
            justify-content: space-between;
        }
        
    </style>
</head>
<body>

<div class="container">

    <ul>
        @foreach($categories as $category)
            <li class="category">
                {{ $category->name }}

                <ul class="products">
                    @forelse($category->products as $product)
                        <li class="product">{{ $product->name }}                 
                            <a href="/product/{{ $product->id }}/edit">ویرایش</a>
                        </li>


                    @empty
                        <li class="product">محصولی ندارد</li>
                    @endforelse
                </ul>
            </li>
        @endforeach
    </ul>
    <a href="/pcreate"><s>s</s></a>
</div>

</body>
</html>
