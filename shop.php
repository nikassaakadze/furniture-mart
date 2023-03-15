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
    <div class="responsive-sidenav-body">

    </div>
  </div>
</div>
<div class="container">
  <div class="filters_bar_shop d-flex-aic">
    <div class="filters_bar_gridSelect d-flex-aic">
      <div class="grid_select grid_by_2">
        <img data-src="./assets/svg/grid-2.svg" alt="">
      </div>
      <div class="grid_select grid_by_3">
        <img data-src="./assets/svg/grid-3.svg" alt="">
      </div>
    </div>
    <div class="shop-filters-responsive-option">
      <i class="bi bi-funnel"></i>
    </div>
    <div class="sticky_dynamic_group">
      <div class="sticky_category" data-id="">
        <div class="sticky_body">
          <span class="sticky_text category_text"></span>
        </div>
        <div class="sticky_remove category_remove">
          <i class="bi bi-x-circle"></i>
        </div>
      </div>
      <div class="sticky_price">
        <div class="sticky body d-flex-aic">
          <div class="sticky_min d-flex-aic">
            <small class="value sticky_price_min">102</small>
            <small class="valuta">.00$</small>
          </div>
          <div class="sticky_max d-flex-aic">
            <small class="value sticky_price_max">200</small>
            <small class="valuta">.00$</small>
          </div>
        </div>
        <div class="sticky_remove price_remove">
          <i class="bi bi-x-circle"></i>
        </div>
      </div>
      <div class="sticky_color" data-id="">
        <div class="sticky_body">
          <span class="sticky_text sticky_color_text"></span>
        </div>
        <div class="sticky_remove remove_sticky_color">
          <i class="bi bi-x-circle"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="shop_page_wrapper container">

<div class="option_widgets">
  <div class="category_widget widget">
    <div class="widget_header">
      <h5 class="widget_typography">Choose category</h5>
    </div>
    <div class="widget_body">
      <ul class="widget_opts_list d-flex-fdc">
        <?php
          $select_categories = "Select * from  `categories`";
          $result = mysqli_query($conn, $select_categories);
          while($row_data = mysqli_fetch_assoc($result)){
            $category_name = $row_data['category_name'];
            $category_id = $row_data['_id'];
            echo " <li data-id='$category_id' data-name='$category_name' class='widget_opts_list_item'>$category_name</li>";
          }
        ?>
      </ul>
    </div>
  </div>
  <div class="price_widget widget">
    <div class="widget_header">
      <h5 class="widget_typography">Filter price</h5>
    </div>
    <div class="widget_body">
      <div class="range-slider">
      <div class="progress"></div>
      <span class="range-min-wrapper">
        <input id="range-min" class="range-min price-filter-slider reset-min" type="range" min="1" max="300" value="1">
      </span>
      <span class="range-max-wrapper">
        <input id="range-max" class="range-max price-filter-slider reset-max" type="range" min="1" max="400" value="400">
      </span>
    </div>
    <div class="prive-filter-range-val d-flex-aic">
      <span class="range-text-typogr">Range:</span>
      <div class="price-ranges d-flex-aic">
        <div class="min-value numberVal">
          <span>$</span>
          <input type="button" class="price-val-field reset-min" min="0" max="400" value="1" disabled>
        </div>
        <div class="max-value numberVal">
          <span>$</span>
          <input type="button" class="border text-center reset-max price-val-field" min="1" max="400" value="400" disabled>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="colors_widget widget">
    <div class="widget_header">
      <h5 class="widget_typography">Choose color</h5>
    </div>
    <div class="widget_body">
      <ul class="widget_opts_list d-flex-fdc">
      <?php
        $select_categories = "Select * from  `colors`";
        $result = mysqli_query($conn, $select_categories);
        while($row_data = mysqli_fetch_assoc($result)){
          $color = $row_data['color'];
          $color_id = $row_data['_id'];
          echo "
          <li class='color_option_choose' >
            <div class='color_option d-flex-aic' data-name='$color' data-id='$color_id'>
              <div style='background: $color ' class='color_circle'></div>
              <span>$color</span>
            </div>
          </li>";}
        ?>
      </ul>
    </div>
  </div>
</div>

<div class="dynamic_feed">
  <div class="product_cards"> 
  <?php
    $select_products = "Select * from  `products` order by rand() LIMIT 0,12";
    $result = mysqli_query($conn, $select_products);
      while($row_data = mysqli_fetch_assoc($result)){
        ?>
        <div class="product_card">
          <a href="./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>">
          <div class="product_card_hero">
            <img data-src="./admin/images/<?= $row_data['hero_1'] ?>" alt="">
          </div>
          </a>
          <div class="product_card_footer">
            <h3 class="product_card_name-typography-2">
              <?= $row_data['name'] ?>
            </h3>
            <div class="card_footer_options d-flex-aic">
              <div class="ft_tocart" data_id="<?= $row_data['_id'] ?>" >
                <i class="bi bi-bag-plus"></i>
                <span>Add to cart</span>
              </div>
              <div class="cart_btn_loeader">
                <img data-src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831" alt="">
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
<div class="filters-responsive-fade">
  <div class="filters-nav-header">
    <div class="filters-nav-close">
      <i class="bi bi-x-lg"></i>
    </div>
   </div>
    <div class="filters-fade-body">

    </div>
</div>
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
<script src="./javascript/javascript.js"></script>
<script src="./javascript/Ajax.js"></script>
<script>
const range = document.querySelectorAll(".range-slider span input");
  progress = document.querySelector(".range-slider .progress");
  let gap = 0.1;
  const inputValue = document.querySelectorAll(".numberVal input");

  range.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minRange = parseInt(range[0].value);
      let maxRange = parseInt(range[1].value);

      if (maxRange - minRange < gap) {
        if (e.target.className === "range-min") {
          range[0].value = maxRange - gap;
        } else {
          range[1].value = minRange + gap;
        }
      } else {
        progress.style.left = (minRange / range[0].max) * 100 + "%";
        progress.style.right = 100 - (maxRange / range[1].max) * 100 + "%";
        inputValue[0].value = minRange;
        inputValue[1].value = maxRange;
      }
    });
  });

</script>
</body>
</html>