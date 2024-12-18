<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Poppins';
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light pt-3 pb-4">
        <div class="container-xxl">
            <a href="/" class="navbar-brand fw-bold" style="font-size: 30px;"><h1><span style="color:#01A8E8; font-weight:700">Only </span><span style="color:#0088C9; font-weight:700">Foods</span></h1></a>

            <div class="d-flex">
                
                
                <div class="position-relative d-inline-flex">
                    <input class="form-control me-2 ps-5 searchInput" style="background-color: #9fdfff; border:none; border-radius:10px;" name="query" type="search" placeholder="Search" aria-label="Search" required>
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                </div>
                    

                <div class="position-relative">
                    <button class="btn-sm border-0 px-3 ms-3 cart" style="background-color: rgba(0, 195, 255, 0.24); border-radius: 15px;" type="submit">
                        <i class="bi bi-cart-fill" style="color: #009dff; font-size: 1.7rem;"></i>
                    </button>
                    <div class="position-absolute justify-content-center align-items-center cartNum" 
                        style="width:25px; height:25px; border-radius:50%; background-color: #2cdcff; top:-5px; right:-5px; color:white; font-size:13px;">
                        
                    </div>
                </div>
                
                

            </div>
            
        </div>
    </nav>

	@yield('content')

</body>
</html>
