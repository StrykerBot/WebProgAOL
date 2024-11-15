<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
</head>
<body>
{{-- blm gw connect ke database, nunggu main menu dulu biar sekalian bs connectin --}}
<div class="cart-container">
    <h3 class="text-center">Daftar Pesanan</h3>
    <div class="cart-item">
        <img src="{{asset('storage/img/Nasi Goreng.jpeg')}}" alt="Sate Ayam">
        <div class="item-info">
            <strong>Sate Ayam (10pcs)</strong><br>
            <small class="text-muted">Tidak pedas</small>
        </div>
        <div class="item-quantity">
            <button class="btn btn-outline-secondary btn-sm">-</button>
            <input type="text" class="form-control form-control-sm text-center mx-1" style="width: 40px;" value="0">
            <button class="btn btn-outline-secondary btn-sm">+</button>
        </div>
    </div>
    <div class="cart-item">
        <img src="{{asset('storage/img/Nasi Goreng.jpeg')}}" alt="Nasi Goreng">
        <div class="item-info">
            <strong>Nasi Goreng</strong><br>
            <small class="text-muted">Extra bawang</small>
        </div>
        <div class="item-quantity">
            <button class="btn btn-outline-secondary btn-sm">-</button>
            <input type="text" class="form-control form-control-sm text-center mx-1" style="width: 40px;" value="0">
            <button class="btn btn-outline-secondary btn-sm">+</button>
        </div>
    </div>
    <div class="cart-item">
        <img src="{{asset('storage/img/Nasi Goreng.jpeg')}}" alt="Ayam Geprek">
        <div class="item-info">
            <strong>Ayam Geprek</strong><br>
            <small class="text-muted">Level 30</small>
        </div>
        <div class="item-quantity">
            <button class="btn btn-outline-secondary btn-sm">-</button>
            <input type="text" class="form-control form-control-sm text-center mx-1" style="width: 40px;" value="0">
            <button class="btn btn-outline-secondary btn-sm">+</button>
        </div>
    </div>
    <div class="cart-item">
        <img src="{{asset('storage/img/Nasi Goreng.jpeg')}}" alt="Pempek Palembang">
        <div class="item-info">
            <strong>Pempek Palembang</strong><br>
            <small class="text-muted">Tidak pakai timun</small>
        </div>
        <div class="item-quantity">
            <button class="btn btn-outline-secondary btn-sm">-</button>
            <input type="text" class="form-control form-control-sm text-center mx-1" style="width: 40px;" value="0">
            <button class="btn btn-outline-secondary btn-sm">+</button>
        </div>
    </div>
    
    <div class="total-container">
        <p>Total Items: 5</p>
        <p>Total Price: Rp 300.000,00</p>
        <button class="btn pay-button w-100">Pay</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
