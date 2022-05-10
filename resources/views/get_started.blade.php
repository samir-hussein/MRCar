<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MRcar</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style3.css') }}">
  <link rel="icon" href="images/L.png">
</head>

<body>
  <section id="header" class="header">
    <div class="nav-bar">
      <div class="logo">
        <a href="/">MRcar<span>.</span></a>
      </div>
      <div class="menu">
        <ul>
          
          
        </ul>
      </div>
      <div class="social-media">
        <ul>
          <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="hero">
      <div class="row">
        <div class="left-sec">
          <div class="content">
            <h2><span>MRcar</span><br>buy&sell</h2>
            
          </div>
          <button class="button">
            <a href="/">Home</a>
          </button>
          <button class="button">
            <a href="{{ route('admin.login') }}">Admin  </a>
          </button>
          <button class="button">
            <a href="{{ route('seller.register') }}">seller  </a>
          </button>
          
        </div>
        <div class="right-sec">
          <div class="my-car">
            <div><img src="images/pngegg (2).png"></div>
            <div><img src="images/pngegg (1).png"></div>
            <div><img src="images/143_Kombibild_3x2_640x427_MINI_P90344368.png"></div>
            <div><img src="images/PngItem_126789.png"></div>
            <div><img src="images/PngItem_2265352.png"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function(){
    
  });

  $(".my-car").slick({
    autoplay: true,
	  speed:1000,
    dots: true,
    customPaging : function(slider, i) {
    var thumb = $(slider.$slides[i]).data();
    return '<a>'+(i+1)+'</a>';
  },
});
</script>
</body>
</html>