@extends("layouts.userView")

@section('content')


    <nav class="user_btns">
        <ul role="menu">

            <li>
                <a href="{{$user?"/users/".$user->id."/cart" : '/login'}}" class="user_btn">
                    <span>
                        <svg class="user_btn__icon">
                            <use href="/img/icon-sprite.svg#icon-shopping-cart" />
                        </svg>
                    </span>
                    cart
                </a>
            </li>
            <li>
                <a href="{{$user?"/users/".$user->id."/orders" : '/login'}}" class="user_btn">
                    <span>
                        <svg class="user_btn__icon">
                            <use href="/img/icon-sprite.svg#icon-briefcase" />
                        </svg>
                    </span>
                    orders
                </a>
            </li>
        </ul>
    </nav>

    <section class="products">
        <h2 class="heading_2">
            <span class="highlight">
                buy 
            </span>
           best products from us
        </h2>

        <div class="products_container">



        @foreach ($products as $product )

            <div class="product" data-id="{{$product->id}}" >
                <div class="price">
                    <div class="unit">1 {{$product->unit}}</div>
                    <div class="unit_price util-lkr">{{$product->price}}</div>
                </div>
                
                <img src="{{$product->img}}" alt="" class="product__img">
                
                <div class="product__details">
                    <div class="name">{{$product->name}}</div>
                    <div class="quantity">{{$product->stoke}} {{$product->unit}} available in stoke</div>
                    <div class="{{$product->stoke >=0?"in":"out"}}-stoke">
                    {{$product->stoke >=0?"in":"out"}} stoke
                    </div>
                </div>

                <form action="#" class="form product__form">
                    <div class="price_container">
                        <div class="price util-lkr total_price">{{$product->price}}</div>
                    </div>
                    <div class="inputs_container">
                          <div class="counter">
                        <button class="btn_round btn_round_minus">-</button>

                            <input type="text" disabled class="count" min="1" value="1" />
                            <button type="button" class="btn_round btn_round_plus">+</button>
                            
                           
                    
                        </div>

                        <button type="submit" class="btn_add-to-card">
                            add to card
                            <svg class="loading-spinner">
                                <use href="/img/icon-sprite.svg#icon-loader" />
                            </svg>
                        </button>

                    </div>

                </form>

                
            </div>

        @endforeach

            
        </div>


    </section>

    <section class="advertise"></section>

    <section class="about-us" id="about-us">
        <div class="left">
            <div class="logo_icon_container">
                <div class="logo__icon size-large light">AU</div>
                
                <img src="./img/plant-2.svg" alt="">
            </div>
            <div class="logo__text big">Aurora plantation</div>
            <div class=" secondary-btn util-green-3">
                contant us
                <svg>
                    <use href="./img/icon-sprite.svg#icon-arrow-up-right" />
                </svg>

            </div>
        </div>
        <div class="right">
            <div class="feild">
                <div class="feild__name">who are we?</div>
                <div class="feild__data">“ AURORA plantation” is a well-established plantation center located in Mawanalle town. . Despite  having a loyal customer base, the plantation is facing a challenge in reaching a wider audience and  expanding its customer base. created @2020</div>
            </div>
            <div class="feild">
                <div class="feild__name">owner</div>
                <div class="feild__data">Mr. Navojith</div>
            </div>
            <div class="feild">
                <div class="feild__name">location</div>
                <div class="feild__data">Colombo road ,mawanella</div>
            </div>
            <div class="feild">
                <div class="feild__name">contact</div>
                <div class="feild__data">076 40 87 1234</div>
            </div>
        </div>
    </section>

@endsection

    
    
</body>
</html>