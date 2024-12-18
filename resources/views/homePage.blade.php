{{-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script type='module' src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/homePage.css')}}">

<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background p-4 d-flex align-items-center justify-content-center">
        <div class="row align-items-center justify-items-center w-100">
            <button class="col m-1 base-buttons d-flex align-items-center" onclick="window.location.href='/mainmenu';">
                <div class="button-img">
                    <img src="{{url('storage/img/Tableware.png')}}" alt="img">
                </div>
                <span class="button-text">Dine In</span>
            </button>
            <button class="col m-1 base-buttons d-flex align-items-center" onclick="window.location.href='/mainmenu';">
                <div class="button-img">
                    <img src="{{url('storage/img/TakeAwayFood.png')}}" alt="img">
                </div>
                <span class="button-text">Takeaway</span>
            </button>
        </div>
    </div>
</body>
