<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Poppins';
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light pt-3 pb-4">
        <div class="container-xxl">
            <a class="navbar-brand fw-bold" style="font-size: 30px;">OnlyFoods</a>
            <form class="d-flex" role="search">
                <div class="position-relative d-inline-flex">
                    <input class="form-control me-2 ps-5" style="background-color: rgba(40, 216, 163, 0.24); border:none; border-radius:10px;" type="search" placeholder="Search" aria-label="Search">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                </div>
                <button class="btn-sm border-0 px-3 ms-3" style="background-color: rgba(40, 216, 163, 0.24);">
                    <i class="bi bi-cart-fill" style="color: #86C87E; font-size: 1.7rem; "></i>
                </button>
            </form>
        </div>
    </nav>

    <section class="banner">
        <div class="container-fluid d-flex justify-content-center align-items-center py-4 mb-3" style="background-color: rgba(40, 216, 163, 0.24);">
            <h1>Promotion Banner</h1>
        </div>

    </section>

    <section class="category">
        <div class="container-xxl d-flex justify-content-center align-items-center mb-3">
            <div class="rounded-pill" style="background-color: rgba(40, 216, 163, 0.24);">

            
            @foreach($categories as $index => $category)
                
                    <!-- <a href="/mainmenu/{{$category->name}}"><button class="btn rounded-pill" style="background-color: #28D8A3;">{{$category->name}}</button></a> -->
                
                    <a href="/mainmenu/{{$category->name}}" class="text-decoration-none">
                        <button class="btn rounded-pill" style="{{ request()->is('mainmenu/' . $category->name) ? 'background-color: #28D8A3;' : '' }}">
                            {{ $category->name }}
                        </button>
                    </a>
                
                
            @endforeach
            </div>
        </div>
    </section>
    @if(isset($cat))
        <section class="listFood">
            <div class="container-xxl">
                <div class="row align-items-center justify-content-center">
                    @foreach($cat->foods as $food)
                        <div class="col-8 col-lg-4 col-xl-3">
                            <div class="card border-1">
                                <div class="card-body">
                                    <div style="height:150px; width:100%;">
                                        <img src="{{ asset('storage/img/' . $food->img_path) }}" 
                                        alt="Uploaded Image" class="img-fluid" 
                                        style="object-fit:cover; height:100%; width:100%;">
                                    </div>
                                    <h6>{{$food->name}}</h6>
                                    <h6>Rp. {{$food->price}}</h6>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>
