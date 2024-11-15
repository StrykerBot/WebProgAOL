<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Poppins';
        }
        button:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light pt-3 pb-4">
        <div class="container-xxl">
            <a class="navbar-brand fw-bold" style="font-size: 30px;"><h1><span style="color:#01A8E8; font-weight:700">Only </span><span style="color:#0088C9; font-weight:700">Foods</span></h1></a>
            {{-- <form class="d-flex" role="search">
                <div class="position-relative d-inline-flex">
                    <input class="form-control me-2 ps-5" style="background-color: rgba(40, 216, 163, 0.24); border:none; border-radius:10px;" type="search" placeholder="Search" aria-label="Search">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                </div>
                
                <button class="btn-sm border-0 px-3 ms-3 cart" style="background-color: rgba(40, 216, 163, 0.24);">
                    <i class="bi bi-cart-fill" style="color: #86C87E; font-size: 1.7rem;"></i>
                </button>
            </form> --}}

            <div class="d-flex">

                <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                    <div class="position-relative d-inline-flex">
                        <input class="form-control me-2 ps-5" style="background-color: rgba(40, 216, 163, 0.24); border:none; border-radius:10px;" name="query" type="search" placeholder="Search" aria-label="Search" required>
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    </div>
                    {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                </form>
                    
                <button class="btn-sm border-0 px-3 ms-3 cart" style="background-color: rgba(40, 216, 163, 0.24);" type="submit">
                    <i class="bi bi-cart-fill" style="color: #86C87E; font-size: 1.7rem;"></i>
                </button>

            </div>
            
        </div>
    </nav>

	@yield('content')

</body>
</html>
