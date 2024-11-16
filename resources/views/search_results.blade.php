@extends('mainTemplate')

@section('content')

<div class="container">
    <h2>Search results for '{{$keyword}}'</h2>
    @if($foods->isEmpty())
        <p>No foods found for keyword '{{$keyword}}'</p>
    @else
        <ul class="list-group">

            <div class="container-sm border border-2 p-4 mb-3" style="border-radius:30px;">
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
        </ul>
    @endif
</div>

@endsection
