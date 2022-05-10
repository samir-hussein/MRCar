<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/L.png">
    <title>Home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo">MRcar<span>.</span></a>

    <nav class="navbar">
        <a href="{{ route('get_started') }}">GET STARTED</a>
        <a href="{{ route('car.sell') }}">SELL CAR</a>
            </nav>

    <div class="icons">
        
        @if (Auth::guard('seller')->check())
            <a href="{{ route('seller.dashboard') }}" class="btn" style="border-radius:30px;">DASHBOARD</a>
        @else
            <a href="{{ route('seller.login') }}" class="btn" style="border-radius:30px;">LOGIN</a>
        @endif

    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>find your car</h3>
        <p>dicover new places with cairo, adventure awaits</p>
        <a href="#" class="btn">discover more</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
        
    </div>

    <div class="video-container">
        <video src="images/hom.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->


<!-- packages section starts  -->

<section class="packages" id="packages">

    <h1 class="heading">
        <span>CHOOSE YOUR DREAM CARS</span>
        
    </h1>

    <div class="box-container jopa">

        @foreach ($cars as $car)
        <div class="box">
            <img src="{{ asset('uploaded_cars/' . $car->img) }}" alt="">
            <div class="content">
                <p>{{ $car->mark }} {{ $car->model }} {{ $car->body }}  {{ $car->year }} {{ $car->color }}</p>
                
                <div class="price">{{ $car->price }} EGP</div>
                <a href="{{ route('car', ['id' => $car->id]) }}" class="btn">read more</a>
            </div>
        </div>
        @endforeach

    </div>

</section>

<!-- packages section ends -->

<!-- brand section  -->
<section class="brand-container">

    <div class="swiper-container brand-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="font-size:25px;"><h1>MRcar<span style="color:#ffa500;">.</span></h1></div>
        </div>
    </div>

</section>

<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas magni pariatur est accusantium voluptas enim nemo facilis sit debitis.</p>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">india</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">book</a>
            <a href="#">packages</a>
            <a href="#">services</a>
            <a href="#">gallery</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>


</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>