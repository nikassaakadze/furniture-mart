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

  <section class="search-result-page">
    <div class="search-result-page-inner container">
    <?php
      if(isset($_GET['search']) &&  ! $_REQUEST['search'] == '' ){
        $search_keyword = $_GET['search'];
        $min_price = 1;
        $max_price = 500;
        if(isset( $_GET['min_price'])){
          $min_price_value = (int) $_GET['min_price'];
        }else{
          $min_price_value = $min_price;
        };
        if(isset($_GET['max_price'])){
          $max_price_value = (int) $_GET['max_price'];
        }else{
          $max_price_value = $max_price;
        };
        $search_query = "
          Select * from  `products` where name  like '%$search_keyword%' && price > $min_price_value && price < $max_price_value ";
          $result = mysqli_query($conn, $search_query);
          $numOfRows = mysqli_num_rows($result);
        ?>
        <div class="search-area-keyowrd d-flex-aic">
          <h1>მოიძებნა <?=$numOfRows?> შედეგი (<mark><?= $_GET['search'] ?></mark>) </h1>
          <div class="price-filter d-flex-aic">
            <span>ფასის ფილტრი:</span>
            <form method="get" action='/ecommerce/search.php?search' class="price-filter-inputs d-flex-aic">
              <input type="hidden" placeholder="" name="search" value='<?= $_GET['search'] ?>' >
              <div class="input-field">
                <span>მინიმუმ:</span>
                <input type="text" placeholder=" <?= $min_price_value ?>" name="min_price" >
              </div>
              <div class="input-field">
                <span>მაქსიმუმ:</span>
              <input type="text" placeholder="<?= $max_price_value ?>" name="max_price" >
              </div>
              <button class="price-filter-btn" type="submit" name=''>გაფილტრვა</button>
            </form>
          </div>
      </div>
      <div class="product-cards-area">
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
              <div class='product-card'>
              <a href='./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>' class='btn list-group-item-primary'>

                <div class='product-card-info'>
                  <h4 class='product-card-name'><?= $row_data['name'] ?></h4>
                  <h6 class='product-card-price'>$<?= $row_data['price'] ?>.00</h6>
                </div>

                <div class='flip-card'>

                  <div class='flip-card-inner'>
                    <div class='flip-card-front'>
                      <img data-src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                    </div>

                    <div class='flip-card-back'>
                      <img data-src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                    </div>
                  </div>

                </div>
              </a>

              <div class="product-card-footer">

                <div class='product-card-rate'>
                  <i class='bi bi-star'></i>
                  <i class='bi bi-star'></i>
                  <i class='bi bi-star'></i>
                </div>
              <?php
                if($row_data['avaliable'] > 0){
                  echo "
                    <div class='product-card-avaliability'>
                      <span>Avaliable: $avaliable</span>
                    </div>
                  ";
                }
                else{
                  echo "
                    <div class='product-card-avaliability not-avalibale'>
                      <span>Out of stock</span>
                    </div>
                  ";
                };
              ?>
              </div>
              <div class="product-card-tocart">
                <a class="d-flex-aic-jcc add-to-cart-button" href='./index.php?add_to_cart=<?= $row_data['_id'] ?>'>
                  <i class="bi bi-bag"></i>
                </a>
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
        $(document).ready(function() {

          $(".ecommerce-slider").owlCarousel({
            navigation : false, 
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true
          });

          $(".category-slider-road").owlCarousel({
            items : 5,
            lazyLoad : true,
            navigation : false,
          });
    
          $(".partners-slider").owlCarousel({
            items : 5,
            lazyLoad : true,
            navigation : false,
          });
        })
        $(".category-menu-button").click(() => {
          $('.category-dropdown-menu').slideToggle()
        })
        </script>
</body>
</html>