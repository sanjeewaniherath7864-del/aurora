<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <title>AURORA Plantations || The Best Plants & food Seller</title>
    <!-- <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
     <script defer src="/js/3rdParty/sweetalert.min.js"></script>
    <script defer src="/js/homeController.js" type="module"></script>
    <style>
        @yield('style')
    </style>

</head>
<body data-id="{{$user?$user->id : ' '}}">
    <header class="header">
        <nav class="nav">
            <a href="./" class="logo">
                <div class="logo__icon">au</div>
                <div class="logo__text">
                    <span class="logo__text--main">aurora</span>
                    <span class="logo__text--sub">plantation</span>
                </div>
            </a>

            <ul role="menu" class="nav__links">
                <li>
                    <a  href="#about-us" class="link">about us</a>
                </li>
                <li>
                    @if ($user)
                    <a  href="/users/{{$user->id}}" class="link btn_login"> profile </a>
                    @else
                        <a  href="/login" class="link btn_login">log <span>in</span> | sign <span>up</span></a>
                    @endif
                    
                </li>
                
            </ul>
        </nav>

        <h1 class="heading_1">
            <span class="underline">top Choice</span> for Fresh Produce and   Premier Plantation Service 
        </h1>

    </header>

    @yield('content')

    <footer class="footer">
        <h3 class="heading__3">Aurora plantation</h3>
        <div class="content">
            <div class="para">
                My name is Sanjeewani, and this website is part of my university project aimed at providing innovative solutions for the Aurora Plantation Company. Through this project, I aim to enhance their online presence and streamline the sales of their fresh fruits, vegetables, and plants.
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
            &copy; 2024 saa. This website is created for SIBM university project. All rights reserved.
        </div>
    </footer>


</body>