@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row d-flex align-items-end">
                @if ($orders != NULL)
                    @foreach($orders as $order)
                        <div class="col-12 pt-3 d-flex">
                            <div class="col-2 pt-3"></div>
                            <div class="col-6 pt-3">
                                <h3 class='d-inline pr-5'>bestelnummer: {{ $order['id'] }}</h3>
                                <h3 class='d-inline'>prijs: € {{ $order['total_price'] }}</h4>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-4  pt-3"></div>
                    <div class="col-4  pt-3">
                    </div>
                @else
                    <p>geen bestellingen</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection