<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<script type='module' src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/startPage.css')}}">

<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background p-4 my-4">
        <div class="row align-items-stretch d-flex h-100">
            <div class="col mx-4 my-2">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h1 style="font-weight:700">Welcome to</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h1><span style="color:#01A8E8; font-weight:700">Only </span><span style="color:#0088C9; font-weight:700">Foods</span></h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="storage/img/Logo.png" alt="img" class="img-fluid">
                    </div>
                </div>
                <button class="base-buttons buttons-large w-100 m-2 p-5"><a href="/home" class="text-decoration-none" style="color: white;">Start Order</a></button>
            </div>
            <div class="col promo d-flex justify-content-center align-items-center mx-4">
                <div class="w-100">
                    <div class="row justify-content-between align-items-center m-2">
                        <div class="col-auto">
                            <button class="arrow">
                                <div class="col-auto">
                                    <img src="{{url('storage/img/Arrow.png')}}" alt="">
                                </div>
                            </button>
                        </div>
                        <div class="col-auto text-center">
                            <h1 style="color:white">Promo 1</h1>
                        </div>
                        <div class="col-auto">
                            <button class="arrow">
                                <div class="col-auto">
                                    <img src="{{url('storage/img/Arrow2.png')}}" alt="">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
