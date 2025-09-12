<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <!-- <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script defer src="/js/3rdParty/sweetalert.min.js"></script>



    @yield('header')

    <title>AURORA Plantations || The Best Plants & food Seller</title>

</head>
<body data-id="{{$user?$user->id:''}}">
    <div class="container">

        <div class="left">
            
            <a href="{{$user?"/".$user->id : "/"}}" class="logo">
                <div class="logo__icon">au</div>
                <div class="logo__text">
                    <span class="logo__text--main">aurora</span>
                    <span class="logo__text--sub">plantation</span>
                </div>
            </a>
            <div class="content">
                @yield('left-content')
                
            </div>
        </div>


        <div class="right">
            @yield('right-content')
        </div>
    </div>
</body>
