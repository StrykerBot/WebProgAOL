<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Foods and Their Categories</h1>

    @foreach ($foods as $food)
        <h2>{{ $food->name }}</h2>
        <ul>
            @foreach ($food->categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
            <img src="{{'storage/img/'.$food->img_path}}" alt="img">
        </ul>
    @endforeach

</body>
</html>