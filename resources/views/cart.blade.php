@extends('layouts.userController')

@section('header')
    <script defer src="/js/orderPlaceFormHandler.js" type="module"></script>
    <script defer src="/js/cartsHandle.js" type="module"></script>

@endsection

@section('left-content')

<h2 class="heading_2 util-align-left">your shopping cart</h2>
<div class="cart_container">

    @foreach ($carts->products as $product)
        <div class="product-item cart" data-id="{{$product->id}}" data-cartid="{{$product->pivot->id}}">
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
                <button role="button" class="btn-remove">delete</button>
                <div class="price">{{$product->price * $product->pivot->quantity}}</div>
            </div>
        </div>

    @endforeach

    

    <div class="cart-price-container"> + 
         <span>your cart is now </span> <span class="price">{{$total}}</span> 
    </div>


</div>
@endsection

@section('right-content')
    <a href="{{$user?"/".$user->id : "/"}}" class="btn-back">
                <svg>
                    <use href="/img/icon-sprite.svg#icon-arrow-left" />
                </svg>
                home
    </a>
    <form action="/users/{{$user->id}}/orders" class="form" method="POST">
                 @csrf
                <h3 class="heading__3 form__heading--s2">shipping details</h3>
                <div class="feild">
                    <label for="" class="feild__label">name</label>
                    <input type="text" class="feild__input" name="customer_name" required/> 
                </div>
                <div class="feild">
                    <label for="" class="feild__label">address</label>
                    <input type="text" class="feild__input" name="address" required/> 
                </div>
                <div class="feild">
                    <label for="" class="feild__label">mobile no</label>
                    <input type="text" class="feild__input" name="mobile_no" required /> 
                </div>

                <h3 class="form__heading--s2">payment details</h3>

                <div class="feild">
                    <label for="" class="feild__label">card holder name</label>
                    <input type="text" class="feild__input" name="card_holder_name" required />
                </div>
                <div class="feild">
                    <label for="" class="feild__label">card number</label>
                    <input type="number" class="feild__input" placeholder="XXXX XXXX XXXX XXXX" name="bank_no" required /> 
                </div>

                <div class="row">
                    <div class="feild">
                        <label for="" class="feild__label">exp date( dd/mm )</label>
                        <input type="text" class="feild__input" placeholder="MM/YY" name="ex_date" required /> 
                    </div>
    
                    <div class="feild">
                        <label for="" class="feild__label">CSV</label>
                        <input type="number" minlength="3" maxlength="3" class="feild__input"  placeholder="XXX" name="csv" required /> 
                    </div>

                </div>

                

                <button type="submit" class="form__btn-submit">let's pay</button>



    </form>
@endsection