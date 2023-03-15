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

<!-- cart page wrapper start -->
<div class="cart_wrapper">
  <div class="cart_inner container">
    <div class="cart_items_feed">
      <?php
          $ip = getIPAddress();
          $total_cart_price = 0;
          $cart_query = "SELECT * FROM `cart` where quantity != '' ";
          if(isset($_SESSION['user'])){
            $cart_query .="AND user IN('".$_SESSION['user']."')";
          }
          else{
            $cart_query .="AND ip_address IN('".$ip."')";
          }
          $result = mysqli_query($conn, $cart_query);
          $result_count = mysqli_num_rows($result);
          if( $result_count > 0){
        while ($row = mysqli_fetch_array($result)) {
          $product_id = $row['product_id'];
          $product_query = "Select * from `products` where _id = '$product_id'";
          $result_products = mysqli_query($conn, $product_query);
          while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['price']);
            $product_values = array_sum($product_price);
            $total_cart_price += $product_values * $row['quantity'];
            ?>
        <div class="cart_item d-flex-aic-jcsb">
          <div class="cart_item_hero">
            <img src="admin/images/<?= $row_product_price['hero_1'] ?>" alt="">
          </div>
          <div class="cart_item_price">
            <h6 class="item_price_typography_6"><?= $row_product_price['price'] ?>.00$</h6>
          </div>
          <div class="cart_item-quantity_widget">
            <div class="cart-produt-quantity">
              <div class="button-container d-flex-aic">  
                <button name='<?= $product_id ?>' class="cart-qty-minus cart-qty-btn" type="button" value="-">-</button>
                <input type="button" name="qty" class="qty" maxlength="12" value='<?= $row['quantity'] ?>' class="input-text qty" />
                <button name='<?= $product_id ?>' class="cart-qty-plus cart-qty-btn" type="button" value="+">+</button>
              </div>
            </div>
          </div>
          <div class="cart_item-remove d-flex-aic-jcc" data-remove='<?= $product_id ?>'>
            <i class="bi bi-trash2-fill"></i>
          </div>
        </div>
        <?php
          }
        }
      }
    ?>
  </div>
  
    <div class="cart_sub_widget">
      <div class="cart_sub_widget_header">
        <h4 class="cart_sub_widget_typography_4">Cart totals</h4>
      </div>
      <div class="cart_sub_widget_header_body">
        <div class="sub_total d-flex-aic-jcsb">
          <h5 class="cart_sub_widget_typography_5">Subtotal</h5>
          <span data-value="<?php echo $total_cart_price ?>" class="total_amount_value"><?php echo $total_cart_price ?>.00$</span>
        </div>
        <div class="shipping_info d-flex-aic-jcsb">
          <h5 class="cart_sub_widget_typography_5">Shipping</h5>
          <i class="bi bi-truck"></i>
        </div>
        <div class="shipping_type">
          <span>Standard Delivery ( free )</span>
        </div>
        <div class="checkout">
          <span>PROCEED TO CHECKOUT</span>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- cart page wrapper end -->
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
<script src="./javascript/Ajax.js"></script>
<script src="./javascript/javascript.js"></script>
<script>
  var incrementPlus;
  var incrementMinus;

  var buttonPlus  = $(".cart-qty-plus");
  var buttonMinus = $(".cart-qty-minus");

  var incrementPlus = buttonPlus.click(function() {
    var $n = $(this).parent(".button-container").find(".qty");
    $n.val(Number($n.val())+1 );
  });

  var incrementMinus = buttonMinus.click(function() {
    var $n = $(this).parent(".button-container").find(".qty");
    var amount = Number($n.val());
    if (amount > 1) {
      $n.val(amount-1);
    }
  })

  localStorage.setItem("total-amount", $('.total_amount_value').attr('data-value'))

</script>
</body>
</html>