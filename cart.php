<?php
  include("includes/connect.php");
  include("functions/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- import local css file  -->
  <link rel="stylesheet" href="css/bundle.css">
  <!-- import bootstrap icons   --CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-arial/css/bpg-arial.min.css">

</head>
<body>

<?php addToCart(); ?>

<!-- add to cart message start  -->
<div class="alert-popup"> 
  <span class="popup-message-body"></span> 
</div>
<!-- add to cart message end  -->

<!-- site top bar start  -->
<div class="site-top-bar">
  <div class="d-flex-aic-jcsb top-bar-inner container">
    <div class="bar-inner-left">
      <span class="top-bar-item">
        <a href="">კონტაქტი</a>
      </span>
      <span class="top-bar-item">
        <a href="">ხშირად დასმული კითხვები</a>
      </span>
      <span class="top-bar-item">
        <a href="">ბლოგი</a>
      </span>
    </div>
    <div class="bar-inner-right d-flex">
      <span class="top-bar-item d-flex-aic">
        <i class="bi bi-headphones"></i>
        <a href="">+ 995 123 456</a>
      </span>
      <span class="top-bar-item d-flex-aic">
      <i class="bi bi-envelope"></i>
        <a href="">Furniture@example.org</a>
      </span>
    </div>
  </div>
</div>
<!-- site top bar end  -->

<!-- site main header start  -->
<div class="main-header header-container">
  <header class="main-header-inner container d-flex-aic-jcsb">
    <div class="header-left-drawer">
      <div class="logo-drawer">
        <a href="./index.php">
          <img data-src="./assets/svg/logo.svg" alt="">
        </a>
      </div>
    </div>
    <div class="header-middle-drawer d-flex-aic">
    <nav class="status-bar-navigation nav-menu">
      <ul class="status-bar-navigation-list d-flex">
        <li class="bar-navigation-list-item"><a href="./index.php">მთავარი</a></li>
        <li class="bar-navigation-list-item"><a href="./shop.php">შოპინგი</a></li>
        <li class="bar-navigation-list-item"><a href="">დახმარება</a></li>
        <li class="bar-navigation-list-item"><a href="">მისამართი</a></li>
      </ul>
    </nav>
      <form class="main-search-form d-flex-aic" action="search.php" role="search">
        <input name="search" placeholder="საძიებო სიტყვა..." class="search-input" type="text">
        <button class="search-button"  type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
    <div class="header-right-drawer header-right-drawer-container d-flex">
      <div class="activity-drawer register">
        <span><i class="bi bi-person-circle"></i></span>
      </div>
      <div class="activity-drawer wish-list">
        <span><i class="bi bi-suit-heart"></i></span>
      </div>
      <div class="activity-drawer cart-icon">
        <a href="./cart.php">
          <span><i class="bi bi-bag"></i></span>
          <div class='cart-badge d-flex-aic-jcc'>
            <?php getCart(); ?>
          </div>
        </a>
      </div>
    </div>
  </header>
</div>
<!-- site main header end  -->

  <!-- cart products start  -->

  <section class="cart-area">
    <div class="cart-area-inner container">
      <div class="cart-cards-feed">
        <?php
          $ip = getIPAddress();
          $total_cart_price = 0;
          $cart_query = "Select * from `cart` where ip_address = '$ip'";
          $result = mysqli_query($conn, $cart_query);
          $result_count = mysqli_num_rows($result);
          if( $result_count > 0){
          while($row = mysqli_fetch_array($result)){
            $product_id = $row['product_id'];
            $product_query = "Select * from `products` where _id = '$product_id'";
            $result_products = mysqli_query($conn, $product_query);
          while($row_product_price = mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['price']);
            $product_values = array_sum($product_price);
            $total_cart_price += $product_values * $row['quantity'];
          ?>
        <div class="cart-prduct d-flex-aic">
          <div class="cart-product-image">
            <img src='admin/images/<?=$row_product_price['hero_1'] ?>' alt="">
          </div>
          <div class="cart-product-info">
            <h1><?=$row_product_price['name']  ?></h1>
            <h3>ფასი: $<?=$row_product_price['price'] ?></h3>
          </div>
          <form id="update_form" class="d-flex-aic" action="functions/updateCart.php" method="post">

            <div class="cart-produt-quantity d-flex-aic">
              <input type="hidden" name = 'productID' value = '<?= $product_id ?>' >
              <input class="quantity-value" type="text" name="qty" value='<?= $row['quantity'] ?>'  >
              <button class="update-cart-quantity" name="update_cart" type="submit" >განახლება</button>
            </div>

            <div class="remove-widget">
              <input type="hidden" name = 'productID' value = '<?= $product_id ?>' >
              <button class="remove-item-from-cart" type="submit" name="remove_item_from_cart">
                <i class="bi bi-trash"></i>
              </button>
            </div>
            
            </form>
        </div>
        <?php                 
        }
      }
    ?>
    </div>
    
      <div class="cart-checkout">
        <h1 class="checkout-headline">ღირებულება </h1>
        <ul class="subtotal-box d-flex-fdc">
          <li>
            <strong>მთლიანი ღირებულება</strong>
            <span>$<?php echo $total_cart_price ?></span>
          </li>
          <li>
            <strong>მიწოდება</strong>
            <i class="bi bi-info-square"></i>
          </li>
        </ul>
        <div class="select-delivery">
          <span>სტანდარტული მიწოდება (უფასო)</span>
        </div>
        <div class="checkout-btn">
          <a href="checkout.php">შეძენა</a>
        </div>
        <div class="checkout-aval-cards">
          <a href="">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/MasterCard_early_1990s_logo.png/1200px-MasterCard_early_1990s_logo.png" alt="">
          </a>
          <a href="">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/Visa_Logo.png/640px-Visa_Logo.png" alt="">
          </a>
          <a href="">
            <img src="https://assets.stickpng.com/images/580b57fcd9996e24bc43c530.png" alt="">
          </a>
        </div>
      </div>
      <?php                 
        }
        else{
          echo "
            <div class='empty-cart-info'>
              <h1>Your cart is empty</h1>
              <div class='redirect-ways'>
                <a class='shop-page-redirect redirect-from-cart' href='index.php'>Go to shopping</a>
                <a class='login-page-redirect redirect-from-cart' href='index.php'>Sign in to your account</a>
              </div>
            </div>
          ";
        }
    ?>
    </div>
  </section>
  <!-- cart products start  -->

<!-- footer start  -->
<footer class="site-footer">
  <div class="site-footer-inner container">
    <div class="footer-drawer">
      <div class="footer-logo">
        <img data-src="assets/svg/logo.svg" alt="">
      </div>
      <p class="footer-description">
        ჩვენ გთავაზობთ 3000 ზე მეტი დასახელების მაღალი ხარისხის პროდუქცია.
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
        <h3>ჩემი ანგარიში</h3>
        <ul class="footer-navLinks-list d-flex-fdc">
          <li> <a href="">როგორ შევიძნო ?</a> </li>
          <li> <a href="">კალათაში გადასვლა</a> </li>
          <li> <a href="">სურვილების სია</a> </li>
          <li> <a href="">დამატებითი ბმულები</a> </li>
        </ul>
      </div>
    </div>
    <div class="footer-drawer">
    <div class="footer-drawer-headline">
        <h3>ინფორმაცია</h3>
        <ul class="footer-navLinks-list d-flex-fdc">
          <li> <a href="">მდებარეობა</a> </li>
          <li> <a href="">მიწოდების სერვისი</a> </li>
          <li> <a href="">სახელმძღავანელო</a> </li>
          <li> <a href="">კითხვები</a> </li>
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

  <!-- local imports  -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="./javascript/main.js"></script>
  <script src="./javascript/owl.js"></script>
  <script>
    $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;      
            $(".clear_cart_btn").removeAttr('disabled');
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;    
            $(".clear_cart_btn").attr('disabled','disabled');              
        });
    }
}); 
  </script>
</body>
</html>