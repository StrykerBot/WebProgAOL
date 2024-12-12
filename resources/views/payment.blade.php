<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/paymentPage.css')}}">
</head>
<body style="background-color: #E5E5E5; overflow:hidden;">
    <div class="container-fluid main-background">
        <!-- <div class="row p-4">
            <div class="arrow mx-2">
                <img src="{{url('storage/img/Arrow3.png')}}" alt="img">
            </div>
        </div> -->
        <div class="row px-5" style="margin-top: 5%; margin-bottom: 1%;">
            <h1 class="paymentText">Choose</h1>
            <h1 class="paymentText">Payment Method</h1>
        </div>
        <div class="row w-100 px-5">
            <div class="col" id="button-group" role="group">
                <div class="row">
                    <button class="col payment-button" type="button" data-method="Card">
                        <img src="{{url('storage/img/Card.png')}}" alt="img">
                    </button>
                    <button class="col payment-button" type="button" data-method="Qris">
                        <img src="{{url('storage/img/Qris.png')}}" alt="img">
                    </button>
                </div>
                <div class="row">
                    <button class="col payment-button" type="button" data-method="E-money">
                        <img src="{{url('storage/img/E-money.png')}}" alt="img">
                    </button>
                    <button class="col payment-button" type="button" data-method="Cash">
                        <img src="{{url('storage/img/Cash.png')}}" alt="img">
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="row" style="padding-left: 15%;">
                    <span class="payment-subtext">Sub total:
                        <span class="payment-amount" id="total-price"></span>
                    </span>
                    <span class="payment-subtext">Tax & Services:
                        <span class="payment-aount" id="tax"></span>
                    </span>
                    <span class="payment-subtext">Discount:
                        <span class="payment-amount disc" id="discount"></span>
                    </span>
                    <span class="payment-subtext">_________________________</span>
                    <span class="payment-subtext" style="padding-top: 2%;">Total:
                        <span class="payment-amount" id="final-price"></span>
                    </span>
                    <div class="col-auto w-100 justify-content-center align-items-center pt-3">
                        <div class="row m-3 justify-content-center align-items-center">
                            <button class="payment-subbutton" id="pay-button" disabled style="cursor:not-allowed">Pay</button>
                        </div>
                        <div class="row m-3 justify-content-center align-items-center">
                            <button class="payment-subbutton" onclick="window.location.href='/cart';">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for payment steps, after choosing payment method -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Steps</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <!-- Dynamic content for payment steps will go here -->
                    <p id="payment-steps">Select a payment method to view the steps.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a href="/paySuccess" class="text-decoration-none" style="color: white;">Proceed with Payment</a></button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cart = JSON.parse(localStorage.getItem('order')) || [];
            const totalPriceElement = document.getElementById('total-price');
            const taxElement = document.getElementById('tax');
            const discountElement = document.getElementById('discount');
            const finalPriceElement = document.getElementById('final-price');
            function updateSummary() {
                let totalPrice = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0);
                let totalOriPrice = cart.reduce((sum, item) => sum + (parseFloat(item.oriPrice) * item.quantity), 0);
                console.log(totalOriPrice);
                totalPriceElement.textContent = `Rp ${totalOriPrice.toLocaleString('id-ID')}`;
                let discount = Math.floor(totalOriPrice-totalPrice);
                let taxes = Math.floor(totalPrice*0.11);
                totalPrice += taxes;
                taxElement.textContent = `Rp ${taxes.toLocaleString('id-ID')}`;
                discountElement.textContent = `Rp ${discount.toLocaleString('id-ID')}`;
                finalPriceElement.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
            }
            updateSummary();
            const buttons = document.querySelectorAll('#button-group .payment-button');
            const payButton = document.getElementById('pay-button');
            let selectedMethod = null;
            payButton.disabled = true;
            buttons.forEach(button => {
                button.addEventListener('click', function(){
                    buttons.forEach(btn => btn.classList.remove('active-button'));
                    this.classList.add('active-button');

                    selectedMethod = this.getAttribute('data-method');
                    // console.log('Selected Method: ', selectedMethod);

                    if(selectedMethod){
                        payButton.disabled = false;
                        payButton.style.cursor = 'pointer';
                    }
                });
            });

            payButton.addEventListener('click', function(){
                if(selectedMethod){
                    const paymentSteps = document.getElementById('payment-steps');

                    if(selectedMethod === 'Card'){
                        paymentSteps.innerHTML = `
                            <ol>
                                <li>Proceed with the instructions in the EDC machine.</li>
                            </ol>
                        `;
                    } else if(selectedMethod === 'Qris'){
                        paymentSteps.innerHTML = `
                            <ol>
                                <li>Scan the QR code with your payment app.</li>
                                <li>Confirm the amount in the app.</li>
                                <li>Receive a payment confirmation.</li>
                            </ol>
                        `;
                    } else if (selectedMethod === 'E-money') {
                        paymentSteps.innerHTML = `
                            <ol>
                                <li>Confirm you have enough funds in your E-money/Flazz card.</li>
                                <li>Tap and hold the card in the marked place below.</li>
                                <li>Release when you hear a sound and the screen shows payment succesful.</li>
                            </ol>
                        `;
                    } else if (selectedMethod === 'Cash') {
                        paymentSteps.innerHTML = `
                            <ol>
                                <li>Prepare the exact cash amount.</li>
                                <li>Insert the cash in the opening below.</li>
                                <li>Receive a receipt.</li>
                            </ol>
                        `;
                    }

                    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                    paymentModal.show();
                } else{
                    alert('Please select a payment method first.');
                }
            });
        });
    </script>
</body>
</html>
