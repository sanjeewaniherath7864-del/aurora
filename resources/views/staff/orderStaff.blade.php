@extends('layouts.staffView')

@section('header')
    <script defer src="/js/staffOrderController.js" type="module"></script>

@endsection

@section('table')



    <div class="order_container">
        <div class="btns_contaier">
            <a href="/staff/{{$user->id}}/orders" class="btn-back">

                <svg>
                    <use href="/img/icon-sprite.svg#icon-arrow-left" />
                </svg>
                orders
            </a>

            <div class="order-id">
                {{$order->id}}
            </div>

            <div class="status status--{{$order->status}}">
                {{$order->status}}
            </div>
        </div>

        <form action="#" method="GET" class="form form-update-order" data-id="{{$order->id}}">
            <h3>update Order</h3>
            <div class="row issue-order">
                <label>issue order</label>
                <input type="date"  name="date" placeholder="{{now()}}">
                <button class="yellow">issue order</button>
            </div>
            <div class="row transport-order">
                <label>transaport order</label>
                <input type="text"  name="vehicle" placeholder="Vehicle No">
                <button class="green">transport order</button>
            </div>
            <div class="row cancel-order">
                <label>cancel order</label>
                <input type="text" class="disabled" name="date" disabled >
                <button class="red">cancel order</button>
            </div>
        </form>
        <div class="order">


            
            <div class="customer_details">
                <div class="customer block">
                    <h4>shipping</h4>
                    <div class="customer__name block__feild">{{$order->customer_name}}</div>
                    <div class="customer__address block__feild">{{str_replace(",",'    ' , $order->address )}}</div>
                    <div class="customer__mobile block__feild">{{$order->mobile_no}}</div>
                </div>
                
                <div class="payment block">
                    <h4>payments</h4>
                    <div class="block__feild">{{$order->bank_card_no}}</div>
                    <div class="block__feild util-lkr">{{$order->price}}</div>
                    <div class="block__feild">-----------------</div>
                    <div class="block__feild ">Vehicle :{{$order->vehicle_no}}</div>
                    <div class="block__feild ">Distance : {{$order->distace_traveled}}</div>
                </div>
            </div>
            
        </div>
            
            
            <div class="cart_container staff">

            @foreach ($order->products as $product )
                <div class="product-item cart">
                    <div class="content">
                        <img src="{{$product->img}}"  class="img" />
                        <div class="product_details">
                            <div class="name">{{$product->name}}</div>
                            <div class="discription">
                                <span class="unit_price">{{$product->price}}</span> X <span class="quantity">{{$product->pivot->quantity}}</span> 
                            </div>
                        </div>

                    </div>
                    <div class="price-details">

                        <div class="price">{{$product->pivot->quantity * $product->price}}</div>
                    </div>
                </div>
            @endforeach
                
        </div>

    </div>

@endsection