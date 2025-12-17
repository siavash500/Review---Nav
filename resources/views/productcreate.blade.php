<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .continer{
            margin: 80px auto;
            text-align: center;
            
        }
        form{
            padding: 10px 10px;
            margin: 10px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 5px 5px 7px 2px rgb(160, 160, 160);
            border-radius: 10px;
            width: 400px;

        }
        form label{
            font-size: large;

        }
        form input{
            width: 350px;
            height: 30px;
        }
        form button{
            padding: 5px 5px;
        }
    </style>
</head>
<body>
    {{-- name name price --}}
    <div class="continer">
        <h1>welcome</h1>
        <form method="post" action="/pcreate">
            @csrf
            <label for="category">category</label>
            <input type="text" name="category">
            <label for="product">product</label>
            <input type="text" name="product">
            <label for="price">price</label>
            <input type="number" name="price">
            <button type="submit" >send</button>
        </form><br>
        <a href="/products"><s>s</s></a>
    </div>
    
</body>
</html>