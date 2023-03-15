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

  <section class="search_result_page">
    <div class="search_result_page_inner container">
    <?php
      if(isset($_GET['search']) && ! $_REQUEST['search'] == '' ){
        $search_keyword = $_GET['search'];
        $search_query = "
          Select * from  `products` where name  like '%$search_keyword%' ";
          $result = mysqli_query($conn, $search_query);
          $numOfRows = mysqli_num_rows($result);
        ?>
        <div class="search_area_header d-flex-aic">
          <div class="search_reult_info">
            <h1 class="search_result_info_typograpy_1">Found <?=$numOfRows?> result <mark><?= $_GET['search'] ?></mark> </h1>
          </div>
          <div class="price_filter d-flex-aic">
            <div class="price_filter_inputs d-flex-aic">
              <div class="filter_input_field max_field d-flex-aic">
                <input type="number" placeholder="1" class="min-price" >
                <span>min</span>
              </div>
              <div class="filter_input_field min_field d-flex-aic">
                <input type="number" placeholder="1000" class="max-price" >
                <span>max</span>
              </div>
              <button class="price_filter_btn" name='<?= $_GET['search'] ?>'>Price</button>
            </div>
          </div>
      </div>
      <div class="product_cards">
        <?php
          if($numOfRows == 0){
            echo "
              <h4 class='result-heading-help'>No matches were found for your search</h4>
            ";
          }
          while($row_data = mysqli_fetch_assoc($result)){
            $_id = $row_data['_id'];
            $avaliable = $row_data['_id'];
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
      <?php } }
      else{
        echo "
          <div class='error-page'>
            <h1 class='404'>404</h1>
            <h3 class='message'>PAGE NOT FOUND</h3>
          </div>
        ";
      }
      ?>
    </div>
    </div>
  </section>
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
<script src="./javascript/Ajax .js"></script>
<script src="./javascript/javascript.js"></script>
<script src="./javascript/uri.js"></script>
<script>
  $('.price_filter_btn').click(function(){
    var parseqrst = URI(document.URL).query(true)
    var minPrice = $('.max-price').val()
    var maxPrice = $('.min-price').val()
    if(minPrice != "" && maxPrice != ""){
      $.ajax({
      type: "POST",
      url: "./functions/filter.php",
      data: {
        'max': maxPrice,
        'min': minPrice,
        'search_keyword': parseqrst.search
      },
      success: function(data){
        $('.product_cards').html(data)
      }
    })
    }
  })
</script>
</body>
</html>