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

<!-- static slider start -->
<div class="ecommerce_slider container">
  <div class="ecommerce_slider_in">
    <div class="ecommerce_slider_item">
      <div class="slider_item_hero">
        <img data-src="./assets/images/chair.png" alt="">
      </div>
      <div class="slider_item_description">
        <div class="item_description_drawer">
        <h1 class="slider_desc_typography_1"> Lennon Dining Chair </h1>
        <p class="slier_desc_ph">
          The Lennon Dining Chair is the perfect combination of beauty and comfort. 
          Well contoured for utmost comfort, the Lennon Dining Chair features a shell-like seat.
        </p>
        <a href="./shop.php">
        <div class="slider_item_button d-flex-aic-jcc">
          <span>View now</span>
        </div>
        </a>
        </div>
      </div>
    </div>
    <div class="ecommerce_slider_item">
      <div class="slider_item_hero">
        <img src="./assets/images/table.png" alt="">
      </div>
      <div class="slider_item_description">
        <div class="item_description_drawer">
        <h1 class="slider_desc_typography_1">Kendal side table</h1>
        <p class="slier_desc_ph">
          The Lennon Dining Chair is the perfect combination of beauty and comfort. 
          Well contoured for utmost comfort, the Lennon Dining Chair features a shell-like seat.
        </p>
        <a href="">
        <div class="slider_item_button d-flex-aic-jcc">
          <span>View now</span>
        </div>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- elementor cards end -->

<!-- category slider start -->
<div class="category_slider container">
  <div class="category_slider_inner">
    <div class="category_slider_road">
      <?php categorySlider() ?>
    </div>
  </div>
</div>
<!-- category slider end -->

<!-- products feed start -->
<div class="products_feed">
  <div class="products_feed_content container">
    <div class="product_cards"> 
    <?php
      $select_products = "Select * from  `products` order by rand() LIMIT 0,12";
      $result = mysqli_query($conn, $select_products);
        while($row_data = mysqli_fetch_assoc($result)){
          ?>
          <div class="product_card">
            <a href="./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>">
            <div class="product_card_hero">
              <img src="./admin/images/<?= $row_data['hero_1'] ?>" alt="">
            </div>
            </a>
            <div class="product_card_footer">
              <h3 class="product_card_name-typography-2">
                <?= $row_data['name'] ?>
              </h3>
              <div class="card_footer_options d-flex-aic">
                <div class="cart_conditls d-flex-aic-jcc">
                  <div class="ft_tocart" data_id="<?= $row_data['_id'] ?>" >
                    <i class="bi bi-bag-plus"></i>
                    <span>Add to cart</span>
                  </div>
                  <div class="cart_btn_loeader">
                    <img src="./assets/images/loader.gif" alt="">
                  </div>
                </div>
                <div class="ft_view">
                  <i class="bi bi-currency-dollar"></i>
                  <?= $row_data['price'] ?>
                </div>
              </div>
            </div>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
<!-- products feed end -->

<!-- banner elements start  -->
<div class="banner_elements_wrap">
  <div class="banner_elements_inner container">
    <div class="banner_element">
      <img data-src="./assets/images/banner-1.jpg" alt="">
      <div class="banner_item_description">
        <h1 class="banner_descr_typography_1">Accessories</h1>
        <h3 class="banner_descr_typography_3">Living room accessories</h3>
        <a href="">
          <div class="buy_btn">
            <span>Buy it now</span>
          </div>
        </a>
      </div>
    </div>
    <div class="banner_element">
      <img data-src="./assets/images/banner-1.jpg" alt="">
      <div class="banner_item_frame d-flex-aic-jcc">
        <h3 class="banner_descr_typography_3"> Don't miss out on style </h3>
      </div>
    </div>
  </div>
</div>
<!-- banner elements end  -->

<!-- ecommerce_wall start -->
<div class="sticky_wall_wrap">
  <div class="sticky_wall_inner container">
    <div class="sticky_wall">
      <div class="sticky_wall_hero">
        <img data-src="./assets/images/details.png" alt="">
        <div class="sticky sticky_sofa">
          <div class="sticky_icon">
            <i class="bi bi-plus"></i>
          </div>
          <div class="sticky_body">
            <div class="sticky_hero">
              <img data-src="./assets/images/details.png" alt="">
            </div>
            <div class="sticky_info">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="sticky sticky_lamp">
          <div class="sticky_icon">
            <i class="bi bi-plus"></i>
          </div>
          <div class="sticky_body">
            <div class="sticky_hero">
              <img data-src="./assets/images/details.png" alt="">
            </div>
            <div class="sticky_info">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="sticky_wall_info">
        <div class="sticky_wall_info_box">
          <div class="wall_info_box_icon">
            <i class="bi bi-snow3"></i>
          </div>
          <h1 class="wall_info_box_typography_1">Winter</h1>
          <p class="wall_info_box_ph">
            How to meet winter: decor and interior trends for 2023
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ecommerce_wall end -->

<!-- footer start  -->
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
<!-- footer end  -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="./javascript/owl-slider.js"></script>
<script src="./javascript/javascript.js"></script>
<script src="./javascript/Ajax.js"></script>
<script>
  $(".ecommerce_slider_in").owlCarousel({
    navigation : false,
    slideSpeed : 300,
    paginationSpeed : 400,
    items : 1, 
    itemsDesktop : false,
    itemsDesktopSmall : false,
    itemsTablet: false,
    itemsMobile : false,
    paginationNumbers: true
  });

  $(".ecommerce_slider_in").trigger('owl.play',3000)

  $(".category_slider_road").owlCarousel({
    items : 5,
    lazyLoad : true,
    navigation : true
  });
</script>
</body>
</html>