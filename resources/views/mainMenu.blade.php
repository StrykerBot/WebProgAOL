@extends('mainTemplate')

@section('content')
    <!-- Banner  -->
    <section class="banner">
        <div class="container-fluid d-flex justify-content-center align-items-center py-4 mb-3" style="background-color: rgba(40, 216, 163, 0.24);">
            <h1>Promotion Banner</h1>
        </div>

    </section>

    <!-- Category Filter -->
    <section class="category">
        <div class="container-xxl d-flex justify-content-center align-items-center mb-3">
            <div class="rounded-pill" style="background-color: rgba(40, 216, 163, 0.24);">

            <button class="btn rounded-pill categories" value="all">All</button>
            @foreach($categories as $index => $category)
                <button class="btn rounded-pill categories shadow-none" value="{{$category->name}}">
                    {{ $category->name }}
                </button>
            @endforeach
            </div>
        </div>
    </section>
    
    <!-- List Food -->
    <section class="listFood"> 
        <div class="container-sm border border-2 p-4 mb-3" style="border-radius:30px;">
            <h2 class="mb-3" style="font-weight: 700;"></h2>
            <div class="row g-4 align-items-center justify-content-center">
                    
            </div>
        </div>
    </section>
    
    <!-- Pagination -->
    <div class="pagination-controls d-flex justify-content-center mb-3" ></div>

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-body text-white d-flex align-items-center justify-content-center" style="background-color: #28D8A3; font-size: 1rem; padding: 20px;">
                <i class="bi bi-check-lg me-2"></i>
                Your Order is Successfully Placed!
            </div>
        </div>
    </div>

    <!-- Modal Show When Food Card is Clicked -->
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
                                <p id="modalFoodDesc">

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
        
    
        
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateFoodBorders() {
                const orderedItems = JSON.parse(localStorage.getItem('order')) || [];
                const foodItems = document.querySelectorAll('.food-item');

                foodItems.forEach(function (item) {
                    const foodId = item.getAttribute('data-id');
                    const card = item.querySelector('.card');
                    if (orderedItems.some(order => order.id === foodId)) {
                        card.style.border = '2px solid #28D8A3';
                    }
                });
            }

            let order = JSON.parse(localStorage.getItem('order')) || [];
            let counter = 1;
            let id;

            const counterDisplay = document.getElementById('counterDisplay');
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const closeBtn = document.querySelector('.close');
            const confirmBtn = document.querySelector('.confirm');
            const paginationContainer = document.querySelector('.pagination-controls');
            const categoryButtons = document.querySelectorAll('.categories');
            const toastLiveExample = document.getElementById('liveToast')
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            let selectedCategory = 'all';  
            let searchNow = '';
            if(order.length){
                document.querySelector('.cartNum').style.display = "flex";
                document.querySelector('.cartNum').textContent = order.length
            }
            else{
                document.querySelector('.cartNum').style.display = "none";
                console.log('a');
            }

            function updateCounter() {
                counterDisplay.textContent = counter;
            }

            
            function fetchFoods(category = 'all', page = 1, searchTerm = '') {
                fetch("{{ route('filter.foods') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ categoryName: category, page, searchTerm })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    renderFoodItems(data.data); 
                    renderPaginationControls(data); 
                    updateFoodBorders(); 
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
            }

            
            function renderFoodItems(foods) {
                const foodListContainer = document.querySelector('.listFood .row');
                foodListContainer.innerHTML = '';
                if(foods.length == 0){
                    foodListContainer.innerHTML = '<h4> No Items Found</h4>'
                    return;
                }
                foods.forEach(food => {
                    const foodItem = document.createElement('div');
                    foodItem.classList.add('col-12', 'col-sm-6', 'col-lg-4', 'col-xl-3', 'food-item');
                    foodItem.setAttribute('data-name', food.name);
                    foodItem.setAttribute('data-price', food.price);
                    foodItem.setAttribute('data-img', food.img_path);
                    foodItem.setAttribute('data-id', food.id);
                    foodItem.setAttribute('data-desc', food.description);

                    foodItem.innerHTML = `
                        <div class="card border-1" style="border-radius: 15px; cursor:pointer;">
                            <div class="card-body">
                                <div style="height:150px; width:100%;">
                                    <img src="${food.img_path}" alt="Uploaded Image" class="img-fluid" 
                                        style="object-fit: cover; height: 100%; width: 100%; border-radius:10px;">
                                </div>
                                <h5 class="mt-2" style="font-weight:600;">${food.name}</h5>
                                <h6 style="font-weight:500;">Rp. ${food.price.toLocaleString()}</h6>
                            </div>
                        </div>
                    `;

                    
                    foodItem.addEventListener('click', function () {
                        counter = 1;
                        updateCounter();

                        const name = this.getAttribute('data-name');
                        const price = this.getAttribute('data-price');
                        const imgPath = this.getAttribute('data-img');
                        id = this.getAttribute('data-id');
                        const desc = this.getAttribute('data-desc');

                        const formattedPrice = parseFloat(price).toLocaleString('id-ID');
                        document.getElementById('modalFoodName').textContent = name;
                        document.getElementById('modalFoodPrice').textContent = 'Rp. ' + formattedPrice;
                        document.getElementById('modalFoodImage').src = imgPath;
                        document.getElementById('modalFoodDesc').textContent = desc;

                        const orderedItems = JSON.parse(localStorage.getItem('order')) || [];
                        const findItem = orderedItems.find(order => order.id === id);
                        if (findItem) {
                            counter = findItem.quantity;
                            updateCounter();
                        }

                        const myModal = new bootstrap.Modal(document.getElementById('foodModal'));
                        myModal.show();
                    });

                    foodListContainer.appendChild(foodItem);
                });
            }

            
            function renderPaginationControls(data) {
                console.log(data)
                paginationContainer.innerHTML = '';

                if (data.prev_page_url.split('&')[0]) {
                    const prevButton = document.createElement('button');
                    prevButton.textContent = 'Previous';
                    prevButton.classList.add('btn', 'btn-lg','btn-secondary', 'mx-1');
                    prevButton.addEventListener('click', () => {
                        fetchFoods(selectedCategory, data.current_page - 1);
                    });
                    paginationContainer.appendChild(prevButton);
                }

                if(data.prev_page_url.split('&')[0] || data.next_page_url.split('&')[0]){
                    for (let i = 1; i <= data.last_page; i++) {
                        const pageButton = document.createElement('button');
                        pageButton.textContent = i;
                        pageButton.classList.add('btn','btn-lg', 'mx-1');
                        if(data.current_page === i){
                            pageButton.style.backgroundColor = '#28D8A3'
                        }
                        pageButton.addEventListener('click', () => {
                            fetchFoods(selectedCategory, i);
                        });
                        paginationContainer.appendChild(pageButton);
                    }
                }
                
                if (data.next_page_url.split('&')[0]) {
                    const nextButton = document.createElement('button');
                    nextButton.textContent = 'Next';
                    nextButton.classList.add('btn','btn-lg', 'btn-secondary', 'mx-1');
                    nextButton.addEventListener('click', () => {
                        fetchFoods(selectedCategory, data.current_page + 1);
                    });
                    paginationContainer.appendChild(nextButton);
                }
                
            }

            categoryButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const category = this.value;
                    selectedCategory = category; 
                    this.style.backgroundColor = '#28D8A3';
                    categoryButtons.forEach(otherButton => {
                        if (otherButton !== this) {
                            otherButton.style.backgroundColor = '';
                        }
                    });

                    const categoryTitle = document.querySelector('.listFood h2');
                    categoryTitle.textContent = category.charAt(0).toUpperCase() + category.slice(1);

                    fetchFoods(category, 1, searchNow);
                });
            });

            document.querySelector('.searchInput').addEventListener('input', function(){
                const searchTerm = this.value;
                searchNow = searchTerm

                fetchFoods(selectedCategory, 1, searchTerm)
            })

            const allButton = document.querySelector('button[value="all"]');
            if (allButton) {
                allButton.click(); 
            }

            confirmBtn.addEventListener('click', function () {
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
                    console.log("Toast is about to show!");
                    toastBootstrap.show()
                    document.querySelector('.cartNum').style.display = "flex";
                    document.querySelector('.cartNum').textContent = order.length
                }
            });

            decreaseBtn.addEventListener('click', function () {
                if (counter > 1) {
                    counter--;
                    updateCounter();
                }
            });

            increaseBtn.addEventListener('click', function () {
                counter++;
                updateCounter();
            });

            closeBtn.addEventListener('click', function () {
                counter = 1;
                updateCounter();
            });

            document.querySelector('.cart').addEventListener('click', function (event) {
                event.preventDefault();
                window.location.href = '/cart';
            });

            updateCounter();
            updateFoodBorders();
        });
    </script>



@endsection