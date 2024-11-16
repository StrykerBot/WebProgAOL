<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
</head>
<body>

<div class="cart-container">
    <a href="/mainmenu" class="back-button">&larr;</a>
    <h3>Daftar Pesanan</h3>

    <div id="cart-items-container">

    </div>
    
    <div class="total-container">
        <div class="summary">
            <p id="total-items">Total Items: 0</p>
            <p id="total-price">Total Price: Rp 0</p>
        </div>
        <button id="pay-button" type="button" class="pay-button w-100" disabled>Payment</button>
        {{-- <a href="{{ url('/payment') }}" id="pay-button" class="pay-button w-100" disabled>Payment</a> --}}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Retrieve the cart data from localStorage
    let cart = JSON.parse(localStorage.getItem('order')) || [];
    
    const cartItemsContainer = document.getElementById('cart-items-container');
    const totalItemsElement = document.getElementById('total-items');
    const totalPriceElement = document.getElementById('total-price');
    const payButton = document.getElementById('pay-button'); // Payment button

    // Function to render the cart
    function renderCart() {
        cartItemsContainer.innerHTML = ''; // Clear the cart container
        
        if (cart.length === 0) {
            console.log('Cart is empty, disabling payment button.');

            cartItemsContainer.innerHTML = '<p class="text-center">Your cart is empty.</p>';
            updateSummary();

            // Disable the payment button if cart is empty
            payButton.setAttribute('disabled', 'true');
            payButton.onclick = null; // Remove any previous click handler
            return;
        }

        cart.forEach((item, index) => {
            const itemHtml = `
                <div class="cart-item">
                    <img src="${item.imgPath}" alt="${item.name}">
                    <div class="item-info">
                        <strong>${item.name}</strong><br>
                        <small class="text-muted">
                            <input type="text" class="form-control form-control-sm note-input" placeholder="Add notes" value="${item.note || ''}" data-index="${index}">
                        </small>
                    </div>
                    <div class="item-quantity">
                        <button class="decrease-btn" data-index="${index}">-</button>
                        <input type="text" class="quantity-input" value="${item.quantity}" data-index="${index}">
                        <button class="increase-btn" data-index="${index}">+</button>
                    </div>
                    <button class="delete-btn" data-index="${index}">&times;</button>
                </div>
            `;
            cartItemsContainer.insertAdjacentHTML('beforeend', itemHtml);
        });

        updateSummary();

        // Enable the payment button if cart has items
        payButton.removeAttribute('disabled');
        payButton.onclick = function() {
            window.location.href = '/payment'; // Redirect to payment page when clicked
        };
    }

    // Function to update the summary
    function updateSummary() {
        const totalItems = cart.reduce((sum, item) => sum + parseInt(item.quantity), 0);
        const totalPrice = cart.reduce((sum, item) => sum + (parseFloat(item.price) * item.quantity), 0);

        totalItemsElement.textContent = `Total Items: ${totalItems}`;
        totalPriceElement.textContent = `Total Price: Rp ${totalPrice.toLocaleString('id-ID')}`;
    }

    // Function to update the local storage
    function updateLocalStorage() {
        localStorage.setItem('order', JSON.stringify(cart));
    }

    // Event listeners for actions
    cartItemsContainer.addEventListener('click', function(event) {
        const index = event.target.dataset.index;

        if (event.target.classList.contains('increase-btn')) {
            cart[index].quantity++;
            updateLocalStorage();
            renderCart();
        } else if (event.target.classList.contains('decrease-btn')) {
            if (cart[index].quantity > 1) {
                cart[index].quantity--;
                updateLocalStorage();
                renderCart();
            }
        } else if (event.target.classList.contains('delete-btn')) {
            cart.splice(index, 1);
            updateLocalStorage();
            renderCart();
        }
    });

    cartItemsContainer.addEventListener('input', function(event) {
        const index = event.target.dataset.index;

        if (event.target.classList.contains('quantity-input')) {
            const newQuantity = parseInt(event.target.value);
            if (newQuantity > 0) {
                cart[index].quantity = newQuantity;
                updateLocalStorage();
                renderCart();
            }
        } else if (event.target.classList.contains('note-input')) {
            const note = event.target.value;
            cart[index].note = note;
            updateLocalStorage();
        }
    });

    // Initial render of the cart
    renderCart();
});



</script>
</body>
</html>
