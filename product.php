<?php
  include("includes/connect.php");
  include("functions/common.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Furniture mart || main page</title>
  <!-- import bootstrap icons  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- static css  -->
  <link rel="stylesheet" href="./css/bundle.css">
</head>
<body>
<!-- preloader  -->
<div class="preloader">
    <img src="./assets/images/loader.gif" alt="">
</div>
<!-- add to cart message start  -->
<div class="alert-popup"> 
  <span class="popup-message-body"></span> 
</div>
<!-- add to cart message end  -->

<!-- header start  -->
<header class="header">

  <div class="header_inner container d-flex-aic-jcsb">
    <div class="menu-icon-hidden">
      <i class="bi bi-list"></i>
    </div>

    <div class="header_logo_widget">
      <a href="./index.php"> <img data-src="./assets/svg/logo.svg" alt=""> </a>
    </div>

    <nav class="header_navigation_widget">
      <ul class="header_navigation_widget_list d-flex-aic">
        <a class="nav_active" href="./index.php">
          <li class="navigation_widget_list_item">Home</li>
        </a>
        <a href="./shop.php">
          <li class="navigation_widget_list_item">Shop</li>
        </a>
        <a href="">
          <li class="navigation_widget_list_item">Help</li>
        </a>
        <a href="">
          <li class="navigation_widget_list_item">Address</li>
        </a>
        <a href="./login.php">
          <li class="navigation_widget_list_item">Login</li>
        </a>
      </ul>
    </nav>

    <div class="header_search_widget d-flex-aic">
      <form action="./search.php" class="search_widget_form d-flex-aic">
        <input class="main_search_field" name="search" placeholder="Type here to search..." type="search">
        <button type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>

    <div class="header_options_widget d-flex-aic">
      <?php
        if(isset($_SESSION['username'])){
          ?>
            <div class="user-logged-in d-flex-aic">
              <small>Hello, <?= $_SESSION['username']?></small>
              <small class="log-out">
                <a href="./functions/logout.php?"><i class="bi bi-box-arrow-in-left"></i></a>
              </small>
          </div>
        <?php } else{
        echo "
          <a href='./login.php'>
            <div class='user_widget'>
              <i class='bi bi-person-circle'></i>
            </div>
          </a>
        ";
        } ?>
      <a href="./cart.php">
        <div class="cart_widget d-flex-aic">
          <i class="bi bi-basket3"></i>
          <div class="cart_widget_info d-flex-aic">
            <small class="cart_count"><?php getCart(); ?></small>
            <small class="cart_total">0.00 $</small>
          </div>
        </div>
      </a>
    </div>

  </div>
</header>
<!-- header end  -->

<!-- responsive sidenav hidden start  -->
<div class="responsive-sidenav">
  <div class="responsive-sidenav-inner">
    <div class="responsive-sidenav-header d-flex">
      <span class="close-responsive-sidenav">
        <i class="bi bi-x-lg"></i>
      </span>
    </div>
    <div class="responsive-sidenav-body"></div>
    <div class="responsive_sidenav_search"></div>
  </div>
</div>
<!-- responsive sidenav hidden start  -->

<div class="responsive-sidenav">
  <div class="responsive-sidenav-inner">
    <div class="responsive-sidenav-header d-flex">
      <span class="close-responsive-sidenav">
        <i class="bi bi-x-lg"></i>
      </span>
    </div>
    <div class="responsive-sidenav-body"></div>
  </div>
</div>

  <!-- product info wrap start -->
  <div class="product_info_wrap">
    <div class="product_info_inner container">
          <?php
          global $conn;
          if(isset($_GET['product'])){
              $product_id = $_GET['product'];
              $select_products = "Select * from  `products` where _id = $product_id ";
              $result = mysqli_query($conn, $select_products);

                while($row_data = mysqli_fetch_assoc($result)){
                  $color = $row_data['color'];
                  $size = $row_data['size'];
                  $description = $row_data['description'];
                  ?>
                  <div class="ecommerce_gallery">
                    <div id='sync1' class='owl-carousel'>
                      <div class='item'>
                        <img data-src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                      </div>
                      <div class='item'>
                        <img data-src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                      </div>
                    </div>

                    <div id='sync2' class='owl-carousel'>
                      <div class='item'>
                        <img data-src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                      </div>
                      <div class='item'>
                        <img data-src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                      </div>
                    </div>

                  </div>
                  <div class="product_full">
                  <div class="product_full_name">
                    <h2 class="product_full_name_typography_2"><?= $row_data['name'] ?></h2>
                  </div>
                  <div class="product_full_price">
                    <h3 class="product_full_name_typography_3"><?= $row_data['price'] ?>.00$</h3>
                  </div>
                  <div class="product_full_description">
                    <p class="product_description_ph"><?= $description ?></p>
                  </div>
                  <div class="product_full_specs">
                    <div class="spec_color d-flex-aic">
                      <span>Color: </span>
                        <?php
                          $select_colors = "Select * from  `colors` where _id = $color ";
                          $result_colors = mysqli_query($conn, $select_colors);
                            while($color_data = mysqli_fetch_assoc($result_colors)){
                            $color_name = $color_data['color'] ?>
                            <div style='background: <?= $color_name ?>' class="color_circle"></div>
                        <?php } ?>
                    </div>
                    <div class="spec_size d-flex-aic">
                      <span>Size: </span>
                        <?php
                          $select_size = "Select * from  `size` where _id = $size ";
                          $result_size = mysqli_query($conn, $select_size);
                            while($size_data = mysqli_fetch_assoc($result_size)){
                            $size_name = $size_data['size']?>
                            <div class="size_circle d-flex-aic-jcc">
                              <small><?= $size_name ?></small>
                            </div>
                        <?php } ?>
                    </div>
                  </div>
                  <div class="product_full_options d-flex-aic">
                    <div class="button-container d-flex-aic">  
                      <button name='' class="cart-qty-minus cart-qty-btn" type="button" value="-">-</button>
                      <input type="button" name="qty" class="qty" maxlength="12" value='1' class="input-text qty" />
                      <button name='' class="cart-qty-plus cart-qty-btn" type="button" value="+">+</button>
                    </div>
                    <?php
                      $cart_query = "Select * from `cart`";
                      $result = mysqli_query($conn, $cart_query);
                      while($row_data = mysqli_fetch_assoc($result)){
                        $id = $row_data['product_id'];
                      }
                    if(isset($id) && $id == $product_id){
                      echo " 
                      <a class='goto-cart-btn d-flex-aic' href='./cart.php'> 
                        <i class='bi bi-bag-check'></i>
                        <span>View in cart</span>
                      </a>";
                    }else{echo"
                      <div data-qty='' data_id='$product_id' class='ft_tocart product_toCart'>
                        <i class='bi bi-basket3'></i>
                        <span>Add to cart</span>
                      </div>
                      ";}
                    ?>
                  </div>
                  <div class="adjust_drawer">
                    <div class="adjust_drawer_header">
                      <span>Tailored to you</span>
                      <i class="bi bi-arrow-down-circle"></i>
                    </div>
                  </div>
                </div>
                <?php } } ?>
    </div>
  </div>
  <!-- product info wrap end -->
  <footer class="site-footer">
  <div class="site-footer-inner container">
    <div class="footer-drawer">
      <div class="footer-logo">
        <img data-src="assets/svg/logo.svg" alt="">
      </div>
      <p class="footer-description">
        We offer more than 3000 titles of high quality products.
      </p>
      <div class="footer-info-list d-flex-fdc">
        <span>
          <i class="bi bi-geo-alt"></i>
          <small>1234 Tbilisi City, Name Of Street.</small>
        </span>
        <span>
          <i class="bi bi-phone"></i>
          <small>(800) 123 456 789.</small>
        </span>
        <span>
          <i class="bi bi-envelope"></i>
          <small>Contact@example.com</small>
        </span>
      </div>
    </div>
    <div class="footer-drawer">
      <div class="footer-drawer-headline">
        <h3>My account</h3>
        <ul class="footer-navLinks-list d-flex-fdc">
          <li> <a href="">How can I buy it? ?</a> </li>
          <li> <a href="">Got to cart</a> </li>
          <li> <a href="">Wish list</a> </li>
          <li> <a href="">Additional links</a> </li>
        </ul>
      </div>
    </div>
    <div class="footer-drawer">
    <div class="footer-drawer-headline">
        <h3>Information</h3>
        <ul class="footer-navLinks-list d-flex-fdc">
          <li> <a href="">Location</a> </li>
          <li> <a href="">Delivery</a> </li>
          <li> <a href="">Manual</a> </li>
          <li> <a href="">Questions</a> </li>
        </ul>
      </div>
    </div>
    <div class="footer-drawer">
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe 
            id="gmap_canvas" 
            data-src="https://maps.google.com/maps?q=tbilisi&t=&z=13&ie=UTF8&iwloc=&output=embed" 
            frameborder="0" 
            scrolling="no" 
            marginheight="0" 
            marginwidth="0">
        </iframe>
      </div>
    </div>
    </div>
  </div>
</footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="./javascript/owl-slider.js"></script>
  <script src="./javascript/javascript.js"></script>
  <script src="./javascript/Ajax.js"></script>
  <script>
$( document ).ready(function() {
  var incrementPlus;
    var incrementMinus;

    var buttonPlus  = $(".cart-qty-plus");
    var buttonMinus = $(".cart-qty-minus");

    var incrementPlus = buttonPlus.click(function() {
      var $n = $(this).parent(".button-container").find(".qty");
      $n.val(Number($n.val())+1 );
      $('.ft_tocart').attr('data-qty', $n.val())
    });

    var incrementMinus = buttonMinus.click(function() {
      var $n = $(this).parent(".button-container").find(".qty");
      var amount = Number($n.val());
      if (amount > 1) {
        $n.val(amount-1);
      }
    })



      var sync1 = $("#sync1");
  var sync2 = $("#sync2");

  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: false,
    pagination:false,
    responsive: true,
    responsiveRefreshRate : 200,
  });

  sync2.owlCarousel({
    items : 3,
    itemsDesktop      : [1199,10],
    itemsDesktopSmall     : [979,10],
    itemsTablet       : [768,8],
    itemsMobile       : [479,4],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });

  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }

  }

  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });

  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }

    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
  }

});
  </script>
</body>
</html>
