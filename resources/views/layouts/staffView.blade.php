<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <title>AURORA {{strtoupper($user->clerk)}} || The Best Plants & food Seller</title>
    <!-- <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script defer src="/js/3rdParty/sweetalert.min.js"></script>
    <script defer src="/js/staffViewController.js" type="module"></script>

    @yield('header')
<style>
    @yield('style')
</style>
</head>
<body data-id="{{$user?$user->id:' '}}">

    <header class="header">
        <nav class="nav">
            <a href="/staff" class="logo">
                <div class="logo__icon">au</div>
                <div class="logo__text">
                    <span class="logo__text--main">aurora</span>
                    <span class="logo__text--sub">plantation</span>
                </div>
            </a>

            <ul role="menu" class="nav__links">
                <li>
                    <a  href="/users/{{$user->id}}" class="link btn_login">profile</a>
                </li>
                
            </ul>
        </nav>

        <h1 class="heading_1">
            welcome to , <span class="underline">{{ucfirst($user->clerk)}} Office cleark</span> 
        </h1>

    </header>

        <nav class="staff_nav">
            <ul role="navigation">
            
            
            @if (preg_match('/^(management|marketing|admin|plantation)$/',$user->clerk))
                    <li>
                        <a href="/staff/{{$user->id}}/orders" class="secondary-btn {{$select=='orders'?'active':''}}" > orders </a> 
                    </li>
            @endif

            @if (preg_match('/^(management|admin|plantation)$/',$user->clerk))
                <li><a href="/staff/{{$user->id}}/transports" class="secondary-btn {{$select=='transports'?'active':''}}" > transports </a></li>
            @endif
<!-- 
            @if (preg_match('/^(management|marketing|admin)$/',$user->clerk))
                <li><a href="/staff/{{$user->id}}/invoices" class="secondary-btn">invoice</a></li>
                
            @endif -->


            @if (preg_match('/^(management|admin|plantation)$/',$user->clerk))
                <li><a href="/staff/{{$user->id}}/products" class="secondary-btn {{$select=='products'?'active':''}}">products</a></li>
            @endif


            @if (preg_match('/^(management|admin)$/',$user->clerk))
                <li><a href="/staff/{{$user->id}}/users" class="secondary-btn {{$select=='users'?'active':''}}">users</a></li>
            @endif
                
        </ul>
    </nav>

    @yield('table')

    @yield('script')


    <footer class="footer">
        <h3 class="heading__3">Aurora plantation</h3>
        <div class="content">
            <div class="para">
                My name is Sanjeewani, and this website is part of my university(SIBA) project aimed at providing innovative solutions for the Aurora Plantation Company. Through this project, I aim to enhance their online presence and streamline the sales of their fresh fruits, vegetables, and plants.
            </div>
            <div class="contact">
                <h4 class="heading__4">contant us</h4>
                <ul class="contact-list">
                    <li>076 30 67 543</li>
                    <li>example@plantation.com</li>
                </ul>
            </div>
        </div>
        <img src="/img/gray-plant.svg" alt="" class="footer-img">
        <div class="copyright">
            &copy; 2024 sanjeewani. This website is created for SIBA university project. All rights reserved.
        </div>
    </footer>

</body>