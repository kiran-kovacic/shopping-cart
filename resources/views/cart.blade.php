@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row d-flex align-items-end">
                @if ($cartInfo['products'] != NULL)
                    @foreach($cartInfo['products'] as $product)
                        <div class="col-12 pt-3 d-flex">
                            <div class="col-2 pt-3"></div>
                            <div class="col-4 pt-3">
                                <img src="{{ $product['article']['image'] }}" class="w-50">
                            </div>
                            <div class="col-6 pt-3">
                                <h3>{{ $product['article']['name'] }}</h3>
                                <h4>{{ $product['article']['brand'] }}</h4>
                                <p>Aantal: {{ $product['qty'] }}</p>
                                <p>€ {{ $product['qty'] * $product['article']['price'] }}</p>
                                <form action="/cart/addOrRemoveArticle/{{ $product['article']['id'] }}">
                                    <input type="submit" class="btn" name="action" value="-">
                                    <input class="number" type="number" name="qty" value="1" min="1">
                                    <input type="submit" class="btn" name="action" value="+">
                                    <input type="submit" class="btn" name="action" value="x">
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-4  pt-3"></div>
                    <div class="col-4  pt-3">
                        <p>Totaalprijs: € {{ $cartInfo['price'] }}</p>
                        <a href="/order/{{ $cartInfo['price'] }}" class="btn add-btn">bestel</a>
                    </div>
                @else
                    <p>winkelwagen is leeg</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection