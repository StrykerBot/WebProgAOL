<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<script type='module' src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/homePage.css')}}">

<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background p-4 d-flex align-items-center justify-content-center">
        <div class="row align-items-center justify-items-center w-100">
            <a class="col m-1 base-buttons d-flex align-items-center justify-content-center text-decoration-none" href="/mainmenu" style="color: white;">
                <div class="button-img">
                    <img src="{{url('storage/img/Tableware.png')}}" alt="img">
                </div>
                <span class="button-text">Dine In</span>
            </a>
            <a class="col m-1 base-buttons d-flex align-items-center justify-content-center text-decoration-none" href="/mainmenu" style="color: white;">
                <div class="button-img">
                    <img src="{{url('storage/img/TakeAwayFood.png')}}" alt="img">
                </div>
                <span class="button-text">Takeaway</span>
            </a>
        </div>
    </div>
</body>
