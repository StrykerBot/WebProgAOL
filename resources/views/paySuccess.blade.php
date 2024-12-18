<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/paySuccessPage.css')}}">
</head>
<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background justify-content-center align-items-center w-100">
        <div class="col-auto justify-content-center align-items-center main-box">
            <div class="row">
                <span class="main-text pb-5">Payment Succesful</span>
            </div>
            <div class="row">
                <span class="main-text big">Order</span>
            </div>
            <div class="row">
                <span class="main-text big">Placed</span>
            </div>
            <div class="row pt-4">
                <img src="{{asset('storage/img/CheckMark.png')}}" alt="img">
            </div>
            <div class="row pt-4">
                <button class="back-button" onclick="clearStorageAndRedirect()">Back to menu</button>
            </div>
        </div>
    </div>
    <script>
        function clearStorageAndRedirect(){
            localStorage.clear();
            window.location.href = '/start';
        }
    </script>
</body>
</html>