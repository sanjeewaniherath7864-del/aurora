@extends('layouts.userController')

@section('left-content')
    <h1 class="heading_1 util-text-24px util-align-center">
        check your all orders
    </h1>
@endsection
               

@section('right-content')
    <a href="/{{$user->id}}" class="btn-back">
        <svg>
            <use href="/img/icon-sprite.svg#icon-arrow-left" />
        </svg>
        home
    </a>
    <div class="orders_container">

        @foreach ($orders as $order)
        
            <a href="/users/{{$user->id}}/orders/{{$order->id}}" class="order_card">

                <div class="util-display-flex">
                    <div class="order_card__state state--{{$order->status}}">{{$order->status}}</div>

                    <div class="order_card__details">
                        <div class="oder_id">#ORDER {{$order->id}}</div>
                        <div class="oder_date">{{$order->created_at}}</div>
                    </div>

                </div>

                <div class="order_card__price util-lkr">{{$order->price}}</div>

            </a>

        @endforeach
    </div>
@endsection