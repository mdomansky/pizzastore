@extends('layouts.app')
@section('bodyclass') cart @endsection

@section('content')
    <div class="container">
        <form class="needs-validation" action="{{ route('cart.store') }}" method="post">
            @csrf
            <div class="row card mb-4 shadow-sm">
                <div class="col pt-3 pb-3">
                    <h4 class="text-muted">Your cart ({{ $order['total_count'] }})</h4>
                    <div class="bg-white mb-3">
                        @foreach($order['pizzas'] as $pizza)
                        <div class="row pizza-item border-bottom pt-3 pb-3">
                            <div class="col-12 col-sm-6 mb-3">
                                <h3 class="my-0">{{ $pizza['pizza']['name'] }}</h3>
                                <span class="text-muted">{{ $pizza['pizza']['short_description'] }}</span>
                                <br />
                                <span class="text-muted">Size: {{ $pizza['pizza']['size'] }}</span>
                                <br />
                                <span class="text-muted">Weight: {{ $pizza['pizza']['weight'] }}</span>
                            </div>
                            <div class="price col-4 col-sm-2 text-center">
                                <span>$<span class="money-amount">{{ $pizza['pizza']['price'] }}</span></span>
                            </div>
                            <div class="qty col-4 col-sm-2 text-center">
                                <a href="#" class="change-count count-down" data-id="{{ $pizza['pizza']['id'] }}">-</a>
                                <span>{{ $pizza['qty'] }}</span>
                                <a href="#" class="change-count count-up" data-id="{{ $pizza['pizza']['id'] }}">+</a>
                            </div>
                            <div class="price_all col-4 col-sm-2 text-center">
                                <span>$<span class="money-amount">{{ ($pizza['pizza']['price'] * $pizza['qty']) }}</span></span>
                            </div>
                        </div>
                        @endforeach
                        <div class="row border-bottom p-3">
                            <div class="col-12 col-sm-6 col-lg-8 text-sm-right">
                                <span class="font-weight-bold">Delivery</span>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 text-center text-sm-right">
                                <select name="deliveryoption" class="form-control">
                                    <option value="0" data-cost="0">I don't need</option>
                                    @foreach ($deliveryoptions as $deliveryoption)
                                    <option value="{{ $deliveryoption->id }}" data-cost="{{ $deliveryoption->cost }}">{{ $deliveryoption->name }} (+${{ $deliveryoption->cost }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="cart-total row mt-5">
                            <div class="col-6">
                                <span class="font-weight-bold">Total (USD)</span>
                            </div>
                            <div class="col-6 text-right">
                                <strong>$<span class="money-amount">{{ $order['total_cost'] }}</span></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="py-5 text-center">
                        <h2>Checkout form</h2>
                        <p class="lead">Please, be careful filling in the form below.</p>
                    </div>

                    <h4 class="mb-3">Buyer information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" value="" required>
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone *</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="" required>
                                <div class="invalid-feedback">
                                    Valid phone is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" name="email">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                        </div>

                        <h4 class="mb-3">Delivery</h4>
                        <div class="mb-3">
                            <label for="delivery_address">Address</label>
                            <input type="text" class="form-control" id="delivery_address" name="delivery_address" disabled="disabled" autocomplete="off">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
                </div>
            </div>
        </form>
    </div>
@endsection
