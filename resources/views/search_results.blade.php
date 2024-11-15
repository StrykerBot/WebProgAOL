@extends('mainTemplate')

@section('content')

<div class="container">
    <h1>Search Results</h1>
    @if($foods->isEmpty())
        <p>No foods found for your search.</p>
    @else
        <ul class="list-group">
            @foreach($foods as $food)
                <li class="list-group-item">{{ $food->name }}</li>
            @endforeach
        </ul>
    @endif
</div>

@endsection
