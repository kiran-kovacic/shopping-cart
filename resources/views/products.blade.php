@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    <div class="row d-flex align-items-end">
        @foreach($articles as $article)
            <div class="col-4 pt-3">
                <a class="productLink" href="producten/{{ $article->id }}">
                    <img src="{{ $article->image }}" class="w-100">
                    <h3>{{ $article->brand }}</h3>
                    <h4>{{ $article->name }}</h4>
                    <p>€ {{ $article->price }}</p>
                    <p>{{ $article->category_id }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
