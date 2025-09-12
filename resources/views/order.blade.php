@extends('layouts.userController')

@section('left-content')
    <h1 class="heading_1 util-align-center util-font-24px">
        #000{{$order->id}}
    </h1>
@endsection
                   
@section('right-content')
    <a href="/users/{{$user->id}}/orders" class="btn-back">
        <svg>
            <use href="/img/icon-sprite.svg#icon-arrow-left" />
        </svg>
        orders
    </a>


    <div class="order">

        <div class="order__header">
            <div class="part__details">
                <h3>Details of Order</h3>
                <div>last update on {{$order->updated_at}}</div>
                <div>#000{{$order->id}} (Order ID) </div>
            </div>
            <div class="part__state">
                <div class="state state--{{$order->status}}">{{$order->status}}</div>
            </div>

        </div>

        <div class="customer_details">
            <div class="customer block">
                <h4>shipping</h4>
                <div class="customer__name block__feild">{{$order->customer_name}}</div>
                <div class="customer__address block__feild">{{str_replace( ',','  ' , $order->address)}}</div>
                <div class="customer__mobile block__feild">{{$order->mobile_no}}</div>
            </div>

            <div class="payment block">
                <h4>payments</h4>
                <div class="block__feild">**** **** **** {{substr($order->bank_card_no , -4 , 4)}}</div>
                <div class="block__feild util-lkr">{{$order->price}}</div>
            </div>
        </div>

        <div class="order__process">
            <ul class="order__step__list">
                <li class="step">
                    <div class="step__dot">
                        <div class="dot"></div>
                    </div>
                    <div class="step__details">
                        <div class="step__details__name">order placed</div>
                        <div class="step__details__date">{{$order->created_at}}</div>
                    </div>
                </li>

                <li class="step">
                    <div class="step__dot">
                        <div class="dot"></div>
                    </div>
                    <div class="step__details">
                        <div class="step__details__name">order issued</div>
                        <div class="step__details__date">{{$order->issued_at? $order->issued_at : "-"}}</div>
                    </div>
                </li>
                <li class="step">
                    <div class="step__dot">
                        <div class="dot"></div>
                    </div>
                    <div class="step__details">
                        <div class="step__details__name">order shipped</div>
                        <div class="step__details__date">{{$order->shipped_at? $order->shipped_at : "-"}}</div>
                    </div>
                </li>
                <li class="step">
                    <div class="step__dot">
                        <div class="dot"></div>
                    </div>
                    <div class="step__details">
                        <div class="step__details__name">order succeded</div>
                        <div class="step__details__date">-</div>
                    </div>
                </li>
            </ul>   
        
            <div class="order__process__progress-bar"></div>
        </div>

        <table class="item-table">
            <tr>
                <th>name</th>
                <th>unit</th>
                <th>unit price</th>
                <th>quantity</th>
                <th>total</th>
            </tr>

            @forEach( $order->products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->unit}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->pivot->quantity * $product->price}}</td>
            </tr>

            @endforEach
        </table>
    </div>
@endsection
