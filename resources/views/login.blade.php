@extends('layouts.userController')

@section('header')
    <script defer src="/js/loginController.js" type="module" ></script>

@endsection

@section('left-content')
    <h1 class="heading_1 util-align-center util-font-24px">
        are readay for shopping world best products
    </h1>
@endsection

@section('right-content')
    <a href="/" class="btn-back">
        <svg>
            <use href="/img/icon-sprite.svg#icon-arrow-left" />
        </svg>
        home
    </a>


    <div class="forms_container">
                <div class="btn-container">
                    <div class="btn">
                        <input type="radio" id="btn-login" name="login-signup-form" checked>
                        <label for="btn-login">
                            <a href="./login" class="secondary-btn">login</a>
                            
                        </label>
                    </div>
                    <div class="btn">
                        <input type="radio" id="btn-signup" name="login-signup-form" >
                        <label for="btn-login">
                            <a href="./signup" class="secondary-btn">create account</a>
                            
                        </label>
                    </div>

                </div>

            
                <form action="#" class="form" method="GET">
 

                    <div class="feild">
                        <label class="feild__label">email</label>
                        <input name="email" type="email" required  class="feild__input" placeholder="example@gmail.com" />

                    </div>
 
                    <div class="feild">
                        <label class="feild__label">password</label>
                        <input name="password" type="password" required  class="feild__input" placeholder="sanjeewani@#$%123" maxlength="16" ></input>

                    </div>
 

   
                    <button type="submit" class="form__btn-submit--round btn-radial-styled--1">let's go to your account </button>
     
                </form>


            </div>
@endsection
