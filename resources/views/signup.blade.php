@extends('layouts.userController')

@section('header')
<style>
    #role{
        width: 100%;
        height: 6rem;
        border-radius: 1rem;
        font-size: 2.4rem;
        text-transform: capitalize;
        padding: 1rem;
        color: var(--color-green-3);
        
    }
</style>


<script defer src="/js/signupController.js" type="module" ></script>
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
                <input type="radio" id="btn-login" name="login-signup-form">
                <label for="btn-login">
                    <a href="/login" class="secondary-btn">login</a>
                    
                </label>
            </div>
            <div class="btn">
                <input type="radio" id="btn-signup" name="login-signup-form" checked>
                <label for="btn-login">
                    <a href="/signup" class="secondary-btn" >create account</a>
                    
                </label>
            </div>

        </div>

    
        <form action="#" class="form" method="POST">

            <div class="feild">
                <label class="feild__label">name</label>
                <input type="text" class="feild__input" placeholder="sanjeewani" name="username"  required/>

            </div>

            <div class="feild">
                <label class="feild__label" >email</label>
                <input type="email" name="email" required class="feild__input" placeholder="example@gmail.com" />

            </div>

            <div class="feild">
                <label class="feild__label">password</label>
                <input type="password" name="password" required minlength="8" class="feild__input" placeholder="sanjeewani@#$%123" maxlength="16"/>

            </div>

            <div class="feild">
                <label class="feild__label" >re-password</label>
                <input type="password" name="repassword" required  minlength="8" class="feild__input" placeholder="sanjeewani@#$%123"  maxlength="16"/>

            </div>
            @if(preg_match('/^(management|admin)$/',$user?$user->clerk:null));
                <div class="feild">
                    <label class="feild__label" >role</label>
                    <select name="role" id="role">
                        <option value="marketing">admin</option>
                        <option value="management">management</option>
                        <option value="plantation">plantation</option>
                    </select>
                </div>
            @endif

            <button type="submit" class="form__btn-submit--round">create free account</button>

        </form>


    </div>

@endsection