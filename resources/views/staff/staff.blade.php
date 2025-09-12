<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/png">
    <title>AURORA {{strtoupper($user->clerk)}} || The Best Plants & food Seller</title>
</head>
<body>

    <header class="header">
        <nav class="nav">
            <a href="./index.html" class="logo">
                <div class="logo__icon">au</div>
                <div class="logo__text">
                    <span class="logo__text--main">aurora</span>
                    <span class="logo__text--sub">plantation</span>
                </div>
            </a>

            <ul role="menu" class="nav__links">
                <li>
                    <a  href="./users/{{$user->id}}" class="link btn_login">profile</a>
                </li>
                
            </ul>
        </nav>

        <h1 class="heading_1">
            welcome to , <span class="underline">Management Office cleark</span> 
        </h1>

    </header>

    <nav class="staff_nav">
        <ul role="navigation">
                <li><a href="#" class="secondary-btn active">orders</a></li>
                <li><a href="#" class="secondary-btn">transport</a></li>
                <li><a href="#" class="secondary-btn">invoice</a></li>
                <li><a href="#" class="secondary-btn">weight ticket</a></li>
                <li><a href="#" class="secondary-btn">sales momo</a></li>
                <li><a href="#" class="secondary-btn">users</a></li>
        </ul>
    </nav>

    @yield('table')


</body>