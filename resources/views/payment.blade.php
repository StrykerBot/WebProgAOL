<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
<script type='module' src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/paymentPage.css')}}">

<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background">
        <div class="row p-4">
            <button class="arrow mx-2">
                <img src="{{url('storage/img/Arrow3.png')}}" alt="img">
            </button>
        </div>
        <div class="row px-5">
            <h1 class="paymentText">Choose</h1>
            <h1 class="paymentText">Payment Method</h1>
        </div>
        <div class="row w-100 px-5">
            <div class="row">
                <button class="col payment-button">
                    <img src="{{url('storage/img/Card.png')}}" alt="img">
                </button>
                <button class="col payment-button">
                    <img src="{{url('storage/img/Qris.png')}}" alt="img">
                </button>
            </div>
            <div class="row">
                <button class="col payment-button">
                    <img src="{{url('storage/img/E-money.png')}}" alt="img">
                </button>
                <button class="col payment-button">
                    <img src="{{url('storage/img/Cash.png')}}" alt="img">
                </button>
            </div>
        </div>
    </div>
</body>
