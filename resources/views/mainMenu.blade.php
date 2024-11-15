@extends('mainTemplate')

@section('content')

    <section class="banner">
        <div class="container-fluid d-flex justify-content-center align-items-center py-4 mb-3" style="background-color: rgba(40, 216, 163, 0.24);">
            <h1>Promotion Banner</h1>
        </div>

    </section>

    <section class="category">
        <div class="container-xxl d-flex justify-content-center align-items-center mb-3">
            <div class="rounded-pill" style="background-color: rgba(40, 216, 163, 0.24);">

            
            @foreach($categories as $index => $category)
                
                    <!-- <a href="/mainmenu/{{$category->name}}"><button class="btn rounded-pill" style="background-color: #28D8A3;">{{$category->name}}</button></a> -->
                
                    <a href="/mainmenu/{{$category->name}}" class="text-decoration-none">
                        <button class="btn rounded-pill" style="{{ request()->is('mainmenu/' . $category->name) ? 'background-color: #28D8A3;' : '' }}">
                            {{ $category->name }}
                        </button>
                    </a>
                
                
            @endforeach
            </div>
        </div>
    </section>
    
    @if(isset($cat))
        <section class="listFood"> 
            <div class="container-sm border border-2 p-4 mb-3" style="border-radius:30px;">
                <h2 class="mb-3" style="font-weight: 700;">{{ $cat->name }}</h2>
                <div class="row g-4 align-items-center justify-content-center">
                    @foreach($foods as $food)
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 food-item"
                            data-name="{{ $food->name }}" 
                            data-price="{{$food->price}}" 
                            data-img="{{ asset('storage/img/' . $food->img_path) }}"
                            data-id = "{{$food->id}}"
                            style="cursor:pointer;">
                            <div class="card border-1" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div style="height:150px; width:100%; ">
                                        <img src="{{ asset('storage/img/' . $food->img_path) }}" 
                                            alt="Uploaded Image" 
                                            class="img-fluid" 
                                            style="object-fit: cover; height: 100%; width: 100%; border-radius:10px;">
                                    </div>
                                    <h5 class="mt-2" style="font-weight:600;">{{ $food->name }}</h5>
                                    <h6 style="font-weight:500;">Rp. {{ number_format($food->price, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </section>
        {{ $foods->links() }}


        <div class="modal fade" id="foodModal" tabindex="-1" aria-labelledby="foodModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius:20px;">
                    <div class="modal-header d-flex justify-content-between">
                        
                        <button type="button" class="btn close" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn confirm" data-bs-dismiss="modal">Confirm</button>
                    </div>
                <div class="modal-body">
                    <div class="position-relative mb-3">
                        <img id="modalFoodImage" class="img-fluid" style="width:100%; border-radius:20px;"/>
                        <div class="position-absolute bottom-0 start-0 container" 
                            style="background-color: rgba(0, 0, 0, 0.5); color: white; width:70%;">
                            <div class="row p-2" >
                                <div class="col-6 d-flex justify-content-center flex-column" style="border:1px solid #28D8A3; border-radius:20px;">
                                    <h3 id="modalFoodName"></h3>
                                    <h5 class="mt-0" id="modalFoodPrice"></h5>
                                </div>
                                <div class="col-6">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, minima!

                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
    
                        <button class="btn btn-lg fw-bold" id="decreaseBtn" style="padding: 10px 20px; font-size: 20px; border: none; background-color: rgba(40, 216, 163, 0.5);">-</button>
                        <div class="px-5 mx-3" id="counterDisplay" style="border: 2px solid #28D8A3; border-radius: 15px; height: 50px; width: 50px; display: flex; justify-content: center; align-items: center; font-size: 18px; font-weight: bold; color: #333;">
                            
                        </div>
                        <button class="btn btn-lg fw-bold" id="increaseBtn" style="padding: 10px 20px; font-size: 20px; border: none; background-color: rgba(40, 216, 163, 0.5);">+</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            // localStorage.clear();
            const foodItems = document.querySelectorAll('.food-item');
            let order = JSON.parse(localStorage.getItem('order')) || [];
            let counter = 1;
            const counterDisplay = document.getElementById('counterDisplay');
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const closeBtn = document.querySelector('.close');
            const confirmBtn = document.querySelector('.confirm');
            let id;
            function updateFoodBorders() {
                const orderedItems = JSON.parse(localStorage.getItem('order')) || [];
                
                foodItems.forEach(function(item) {
                    const foodId = item.getAttribute('data-id');
                    const card = item.querySelector('.card');
                    if (orderedItems.some(order => order.id === foodId)) {
                        card.style.border = '2px solid #28D8A3';
                    }
                });
            }
            
            updateFoodBorders();
            function updateCounter() {
                counterDisplay.textContent = counter;
            }
            document.querySelector('.cart').addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = '/cart';
            });
            foodItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    counter = 1;
                    updateCounter();
                    const name = this.getAttribute('data-name');
                    const price = this.getAttribute('data-price');
                    const imgPath = this.getAttribute('data-img');
                    id = this.getAttribute('data-id');
                    const formattedPrice = parseFloat(price).toLocaleString('id-ID');
                    
                    document.getElementById('modalFoodName').textContent = name;
                    document.getElementById('modalFoodPrice').textContent = 'Rp. ' + formattedPrice;
                    document.getElementById('modalFoodImage').src = imgPath;
                    const orderedItems = JSON.parse(localStorage.getItem('order')) || [];
                    const findItem = orderedItems.find(order => order.id === id)
                    if (findItem) {
                        counter = findItem.quantity
                        updateCounter();
                    }
                    var myModal = new bootstrap.Modal(document.getElementById('foodModal'));
                    myModal.show();

                    const confirmBtn = document.querySelector('.confirm');
                    
                });
            });
            confirmBtn.addEventListener('click', function() {
                const quantity = parseInt(document.getElementById('counterDisplay').textContent);
                const foodItem = document.querySelector('.food-item[data-id="' + id + '"]');
                if (foodItem) {
                    const id = foodItem.getAttribute('data-id');
                    const name = foodItem.getAttribute('data-name');
                    const price = foodItem.getAttribute('data-price');
                    const imgPath = foodItem.getAttribute('data-img');
                    
                    const existingItemIndex = order.findIndex(item => item.id === id);
                    if (existingItemIndex !== -1) {
                        order[existingItemIndex].quantity = quantity;
                    } else {
                        const newItem = {
                            id: id,
                            name: name,
                            price: price,
                            quantity: quantity,
                            imgPath: imgPath
                        };
                        order.push(newItem);
                    }
                    localStorage.setItem('order', JSON.stringify(order));
                    updateFoodBorders();
                }
            });
            counterDisplay.textContent = counter;
            
            decreaseBtn.addEventListener('click', function() {
                if (counter > 1) {
                    counter--;
                    updateCounter();
                }
            });

            // Increase the counter when the + button is clicked
            increaseBtn.addEventListener('click', function() {
                counter++;
                updateCounter();
            });
            closeBtn.addEventListener('click', function(){
                counter = 1;
                updateCounter();
            })


        });

    </script>



@endsection