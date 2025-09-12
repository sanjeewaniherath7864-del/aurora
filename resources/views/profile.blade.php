@extends('layouts.userController')

@section('header')

<style>
    .btn-logout{
        cursor: pointer;
        margin: 2rem;
        margin-left: auto;
        margin-top: -3rem;
        border: 1px solid var(--color-red);
        color: var(--color-red);
        margin-right: -2rem;
    }

    .btn-logout:hover, .btn-logout:active{
        background-color: var(--color-red);
        color:#fff;
    }
</style>


<script defer src="../js/updateProfileController.js" type="module" ></script> 

@endsection

@section('left-content')

    <h1 class="heading_1 util-align-center util-font-24px">
        Hi , {{$user->name}}
    </h1>

@endsection

@section('right-content')

        <span class="btn-logout secondary-btn">log out</span>


        @if($user->role == 'user')
            <a href="{{'/'.$user->id}}" class="btn-back">
                <svg>
                    <use href="../img/icon-sprite.svg#icon-arrow-left" />
                </svg>
                home
            </a>
        @endif
        @if ($user->role =="staff")
        <a href="/staff/{{$user->id}}" class="btn-back">
                <svg>
                    <use href="/img/icon-sprite.svg#icon-arrow-left" />
                </svg>
                home
            </a>
        @endif
    
            

            <div class="update_user form_container">
                <div class="update_user__header">
                    <h3>update details</h3>

                    <div class="toggle">

                        <div class="toggle__label">
                            <svg class="toggle__label__icon--lock">
                                <use href="../img/icon-sprite.svg#icon-lock" />
                            </svg>
                            
                            <svg class="toggle__label__icon--unlock">
                                <use href="../img/icon-sprite.svg#icon-unlock" />
                            </svg>
                        </div>

                        <div class="toggle__input">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>

                <form action="#" class="form form__update_user" data-id="{{$user->id}}">
                    <label class="required"> for update user please unlock from by click toggle button on right side</label>
                    <div class="feild">
                        <div class="feild__label">name</div>
                        <input type="text" disabled value="{{$user->name}}" class="feild__input" name="username">
                    </div>
                    <div class="feild">
                        <div class="feild__label">email</div>
                        <input type="email" value="{{$user->email}}" class="feild__input" disabled name="email">
                    </div>
                    <div class="feild">
                        <div class="feild__label">password</div>
                        <input type="password" disabled class="feild__input" name="password">
                    </div>
                    <div class="feild">
                        <div class="feild__label">re-password</div>
                        <input type="password" disabled class="feild__input" name="repassword">
                    </div>

                    <div class="btn_container">
                        <button type="reset"  class="secondary-btn">cancel</button>
                        <button type="submit" class="secondary-btn">update</button>
                    </div>
                </form>
            </div>

            <div class="delete_user form_container">
                <h3>detele account</h3>
                <form action="#" class="form form__delete_user" data-id="{{$user->id}}">
                    <div class="feild">
                        <div class="feild__label">password</div>
                        <input type="password" class="feild__input" name="password"/>
                    </div>
                    <div class="btn_container">
                        <button type="reset"  class="secondary-btn">cancel</button>
                        <button type="submit" class="secondary-btn">delete</button>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
@endsection 
