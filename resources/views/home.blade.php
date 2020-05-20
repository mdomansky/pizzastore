@extends('layouts.app')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">PizzaStore</h1>
    </div>

    <div class="pizzas-list card-deck mb-3 text-center">
        @foreach ($pizzas as $pizza)
        <div class="pizza card mb-4 shadow-sm">
            <div class="card-header container">
                <div class="row">
                    <div class="col-12 col-sm-8">
                        <h2 class="my-0 font-weight-normal">{{ $pizza->name }}</h2>
                    </div>
                    <div class="icons d-none d-sm-block col-sm-4">
                        @if ($pizza->is_spicy)
                        <i class="fas fa-fire"></i>
                        @endif
                        @if ($pizza->is_popular)
                        <i class="fab fa-hotjar"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="{{ $pizza->image }}" alt="{{ $pizza->name }}">
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">US ${{ $pizza->price }}</h1>
                <div class="short_description">
                    <p>{{ $pizza->short_description }}</p>
                </div>
                <button type="button" class="btn btn-lg btn-block btn-outline-primary mt-3">Add to cart</button>
            </div>
        </div>
        @endforeach
    </div>
@endsection
