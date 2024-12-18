<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://webprogaol-production.up.railway.app/css/startPage.css">

<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background p-4 my-4">
        <div class="row align-items-stretch d-flex h-100">
            <div class="col mx-4 my-2 justify-content-center" style="display: flex; flex-direction: column; gap: 48px;">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h1 style="font-weight:700; font-size: 64px;">Welcome to</h1>
                    </div>
                </div>
                {{-- <div class="row justify-content-center">
                    <div class="col-auto">
                        <h1><span style="color:#01A8E8; font-weight:700">Only </span><span style="color:#0088C9; font-weight:700">Foods</span></h1>
                    </div>
                </div> --}}
                <div class="row justify-content-center">
                    <div class="col-auto" style="width: 400px">
                        <img src="storage/img/Logo_New.png" alt="img" class="img-fluid">
                    </div>
                </div>
                <button class="base-buttons buttons-large w-100 p-5" style="background-color: #46B8F0;" onclick="window.location.href='/mainmenu';">Start Order</button>
            </div>


            {{-- <div class="col promo d-flex justify-content-center align-items-center mx-4" style="position: relative;">
                
                <div style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; border-radius: 35px; object-fit: fill; overflow: hidden; background-color:rgba(255,255,255,.5); z-index: 1;">
                     
                    <div style="position: absolute; top: 40px; left: 80px; z-index: 2; color: #FFF; text-shadow: 2px 2px 4px #000;">
                        <div style="font-size: 24px;">Up to</div>
                        <div style="font-size: 64px; margin-top: -16px; margin-bottom: -16px; font-weight: bold;">40% off</div>
                        <div style="font-size: 32px;">Family Dinner</div>
                    </div>

                    <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2; color: #FFF; text-shadow: 4px 4px 8px #FF0000, -4px -4px 8px #008000; font-size: 64px; font-weight: bold; text-align: center; line-height: 1;">
                        ❄️CHRISTMAS❄️<br>🎄PROMO🎄
                    </div>

                    <img src="storage/img/PromoPic_1.jpg" style="position: absolute; height: 100%; object-fit: fill;">
                </div>
                
                <div class="w-100" style="z-index: 5;">
                    <div class="row justify-content-between align-items-center m-2">
                        <div class="col-auto">
                            <button class="arrow">
                                <div class="col-auto">
                                    <img src="{{url('storage/img/Arrow.png')}}" alt="">
                                </div>
                            </button>
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
                
            </div> --}}

            <div class="col promo d-flex justify-content-center align-items-center mx-4" style="position: relative;">
                
                <div id="promo-container" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; border-radius: 35px; object-fit: fill; overflow: hidden; background-color:rgba(255,255,255,.5); z-index: 1;">
                     
                    <div id="promo-text" style="position: absolute; top: 40px; left: 80px; z-index: 2; color: #FFF; text-shadow: 2px 2px 4px #000;">
                        <div style="font-size: 24px;">Up to</div>
                        <div style="font-size: 64px; margin-top: -16px; margin-bottom: -16px; font-weight: bold;">40% off</div>
                        <div style="font-size: 32px;">Family Dinner</div>
                    </div>

                    <div id="promo-christmas" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 2; color: #FFF; text-shadow: 4px 4px 8px #FF0000, -4px -4px 8px #008000; font-size: 64px; font-weight: bold; text-align: center; line-height: 1;">
                        ❄️CHRISTMAS❄️<br>🎄PROMO🎄
                    </div>

                    <img id="promo-image" src="storage/img/PromoPic_1.jpg" style="position: absolute; height: 100%; width: 100%; object-fit: cover;"></div>
                
                <div class="w-100" style="z-index: 5;">
                    <div class="row justify-content-between align-items-center m-2">
                        <div class="col-auto">
                            <button class="arrow" onclick="showPreviousPromo()">
                                <div class="col-auto">
                                    <img src="{{url('storage/img/Arrow.png')}}" alt="">
                                </div>
                            </button>
                        </div>
                        
                        <div class="col-auto">
                            <button class="arrow" onclick="showNextPromo()">
                                <div class="col-auto">
                                    <img src="{{url('storage/img/Arrow2.png')}}" alt="">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <script>
                let currentPromo = 0;
                const promos = [
                    {
                        text: `<div style="font-size: 24px;">Up to</div>
                            <div style="font-size: 64px; margin-top: -16px; margin-bottom: -16px; font-weight: bold;">40% off</div>
                            <div style="font-size: 32px;">Family Dinner</div>`,
                        christmas: `❄️CHRISTMAS❄️<br>🎄PROMO🎄`,
                        image: `storage/img/PromoPic_1.jpg`
                    },
                    {
                        text: `<div style="font-size: 24px;">Save</div>
                            <div style="font-size: 64px; margin-top: -16px; margin-bottom: -16px; font-weight: bold;">20%</div>
                            <div style="font-size: 32px;">on Desserts</div>`,
                        christmas: `WEEKEND<br>SPECIAL`,
                        image: `storage/img/PromoPic_2.jpg`
                    }
                ];

                function showPromo(index) {
                    document.getElementById('promo-text').innerHTML = promos[index].text;
                    document.getElementById('promo-christmas').innerHTML = promos[index].christmas;
                    document.getElementById('promo-image').src = promos[index].image;
                }

                function showNextPromo() {
                    currentPromo = (currentPromo + 1) % promos.length;
                    showPromo(currentPromo);
                }

                function showPreviousPromo() {
                    currentPromo = (currentPromo - 1 + promos.length) % promos.length;
                    showPromo(currentPromo);
                }
            </script>



            

        </div>
    </div>
</body>
