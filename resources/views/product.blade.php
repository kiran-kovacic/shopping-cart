@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <div class="row d-flex align-items-start">
        <div class="col-8 pt-3">
            <img src="{{ $article->image }}" class="w-200">
        </div>
        <div class="col-4 pt-3">
        <h3>{{ $article->brand }}</h3>
            <h4>{{ $article->name }}</h4>
            <p>€ {{ $article->price }}</p>
            <p class="pt-3">{{ $article->description }}</p>
            <form action="" class="mt-3">
                <input class="number" type="number" value="1" min="1" max="50">
                <input class="btn add-btn" type="sumit" value="Add to cart">
            </form>
            
        </div>
    </div>
</div>
@endsection
