@extends('layouts.app')
@section('bodyclass') cart @endsection

@section('content')
    <div class="container">
        <div class="row card mb-4 shadow-sm">
            <div class="col pt-3 pb-3">
                <h4 class="text-muted">Your order № {{ $order->id }}</h4>
                <p>Name: {{ $order->name }}
                <br />Phone: {{ $order->phone }}
                <br />E-mail: {{ $order->email }}
                @if ($order->delivery_address)
                <br />Delivery: {{ $order->delivery_name }}, address: {{ $order->delivery_address }}
                @endif
                </p>
                <div class="bg-white mb-3">
                    @php $total_cost = $order->delivery_cost; @endphp
                    @foreach($order->orderpizzas as $pizza)
                    @php $total_cost += $pizza->price * $pizza->qty; @endphp 
                    <div class="row pizza-item border-bottom pt-3 pb-3">
                        <div class="col-12 col-sm-6 mb-3">
                            <h3 class="my-0">{{ $pizza->name }}</h3>
                            <span class="text-muted">{{ $pizza->short_description }}</span>
                            <br />
                            <span class="text-muted">Size: {{ $pizza->size }}</span>
                            <br />
                            <span class="text-muted">Weight: {{ $pizza->weight }}</span>
                        </div>
                        <div class="price col-4 col-sm-2 text-center">
                            <span>$<span class="money-amount">{{ $pizza->price }}</span></span>
                        </div>
                        <div class="qty col-4 col-sm-2 text-center">
                            <span>{{ $pizza->qty }}</span>
                        </div>
                        <div class="price_all col-4 col-sm-2 text-center">
                            <span>$<span class="money-amount">{{ $pizza->price * $pizza->qty }}</span></span>
                        </div>
                    </div>
                    @endforeach
                    <div class="row border-bottom p-3">
                        <div class="col-6">
                            <span class="font-weight-bold">Delivery ({{ $order->delivery_name }})</span>
                        </div>
                        <div class="col-6 text-right">
                            <span>$<span class="money-amount">{{ $order->delivery_cost }}</span></span>
                        </div>
                    </div>
                    <div class="cart-total row mt-5">
                        <div class="col-6">
                            <span class="font-weight-bold">Total (USD)</span>
                        </div>
                        <div class="col-6 text-right">
                            <strong>$<span class="money-amount">{{ $total_cost }}</span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
