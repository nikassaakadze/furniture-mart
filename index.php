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
        <a href="">
          <span>კონტაქტი</span>
          <i class="bi bi-person-lines-fill"></i>
        </a>
      </span>
      <span class="top-bar-item">
        <a href="">
          <span>ხშირად დასმული კითხვები</span>
          <i class="bi bi-patch-question"></i>
        </a>
      </span>
      <span class="top-bar-item">
        <a href="">
          <span>ბლოგი</span>
          <i class="bi bi-flower3"></i>
        </a>
      </span>
    </div>
    <div class="bar-inner-right d-flex">
      <span class="top-bar-item d-flex-aic">
        <a href="">
          <i class="bi bi-headphones"></i>
          <span>+ 995 123 456</span>
        </a>
      </span>
      <span class="top-bar-item d-flex-aic">
        <a href="">
          <i class="bi bi-envelope"></i>
          <span>Furniture@example.org</span>
        </a>
      </span>
    </div>
  </div>
</div>
<!-- site top bar end  -->

<!-- site main header start  -->
<div class="main-header">
  <header class="main-header-inner container d-flex-aic-jcsb">
    <div class="header-left-drawer">
      <div class="logo-drawer">
        <a href="./index.php">
          <img data-src="./assets/svg/logo.svg" alt="">
        </a>
      </div>
    </div>
    <div class="header-middle-drawer d-flex-aic">
      <form class="main-search-form d-flex-aic" action="search.php" role="search">
        <input name="search" placeholder="საძიებო სიტყვა..." class="search-input" type="text">
        <button class="search-button"  type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
    <div class="header-right-drawer d-flex">
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

<!-- search bar start  -->
<section class="status-bar">
  <div class="status-bar-inner container d-flex-aic">
    <div class="vertical-menu-drawer">
      <div class="category-menu-button d-flex-aic-jcc">
        <i class="bi bi-list"></i>
        <span>კატეგორიის მიხედვით</span>
      </div>
      <div class="category-dropdown-menu">
        <ul>
          <?php
            $select_categories = "Select * from  `categories`";
            $result = mysqli_query($conn, $select_categories);
            while($row_data = mysqli_fetch_assoc($result)){
              $category_name = $row_data['category_name'];
              $category_id = $row_data['_id'];
              echo " <li><a href='./category.php?category=$category_id'>$category_name</a></li>";
            }
          ?>
        </ul>
      </div>
    </div>
    <nav class="status-bar-navigation">
      <ul class="status-bar-navigation-list d-flex">
        <li class="bar-navigation-list-item"><a href="">მთავარი</a></li>
        <li class="bar-navigation-list-item"><a href="./shop.php">შოპინგი</a></li>
        <li class="bar-navigation-list-item"><a href="">დახმარება</a></li>
        <li class="bar-navigation-list-item"><a href="">მისამართი</a></li>
      </ul>
      <div class="menu-icon-hidden">
        <i class="bi bi-list"></i>
      </div>
    </nav>
  </div>
</section>
<!-- search bar end  -->

<!-- slider section start  -->
<section class="slider-drawer">
  <div class="ecommerce-slider">
    <div class="item">
      <div class="slide-item-content">
          <img data-src="https://images5.alphacoders.com/647/647570.jpg" alt="">
        <div class="slider-item-description-box">
          <i class="bi bi-plugin"></i>
          <h3>30%-იანი ფასდაკლება</h3>
          <h2>სამზარეულოს კოლექციაზე</h2>
          <div class="description-box-btn">
            <a href="">შეიძინეთ ახლავე</a>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-item-content">
        <img data-src="https://images2.alphacoders.com/270/270990.jpg" alt="">
        <div class="slider-item-description-box">
          <i class="bi bi-plugin"></i>
          <h3>30%-იანი ფასდაკლება</h3>
          <h2>სამზარეულოს კოლექციაზე</h2>
          <div class="description-box-btn">
            <a href="">შეიძინეთ ახლავე</a>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-item-content">
        <img data-src="https://www.camerongalliers.co.uk/sites/default/files/2021-02/iStock-619647642crop.jpg" alt="">
        <div class="slider-item-description-box">
          <i class="bi bi-plugin"></i>
          <h3>30%-იანი ფასდაკლება</h3>
          <h2>სამზარეულოს კოლექციაზე</h2>
          <div class="description-box-btn">
            <a href="">შეიძინეთ ახლავე</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- slider section end -->

<!-- categories slider start  -->
<div class="category-slider">
  <div class="category-slider-road container">
    <?php categorySlider(); ?>
  </div>
</div>
<!-- categories slider  end -->

<!-- products feed start -->
<section class="product-feed">
  <div class="product-feed-inner container">
    <div class="feed-section-headline">
      <h1 class="section-hd-typography">პოპულარული პროდუქცია</h1>
      <p class="seaction-headline-ph">წარმოგიდგენთ ყველაზე მოთხოვნად პროდუქციას სტატისტიკის მიხედვით</p>
    </div>
    <div class="product-cards-area">
      <?php
        $select_products = "Select * from  `products` order by rand() LIMIT 0,12";
        $result = mysqli_query($conn, $select_products);
          while($row_data = mysqli_fetch_assoc($result)){
            $avaliable = $row_data['avaliable'];
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
                      <span>მარაგშია: $avaliable</span>
                    </div>
                  ";
                }
                else{
                  echo "
                    <div class='product-card-avaliability not-avalibale'>
                      <span>მარაგი ამოიწურა</span>
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
      <?php } ?>
    </div>
  </div>
</section>
<!-- products feed end -->

<!-- shopping by styles start  -->
<!-- <section class="shop-by-styles">
  <div class="shop-by-styles-inner container">
    <div class="style-banner-window">
      <div class="styles-banner-info">
        <h1>სამზარეულოს კარადები​</h1>
        <h5>მოაწყვეთ სამზარეულო მაღალი ხარისხის კარადებით</h5>
        <a href="" class="shop-btn">შეიძნეთ ახლავე</a>
      </div>
      <div class="byStyle-banner-hero">
        <img data-src="https://demo.lion-themes.net/outstock/wp-content/uploads/2016/07/bannerhome1-4.jpg" alt="">
      </div>
    </div>
    <div class="style-banner-window small-window">
      <div class="styles-banner-info">
        <h1>არ ჩამორჩეთ სტილს​</h1>
      </div>
      <div class="byStyle-banner-hero">
        <img data-src="https://demo.lion-themes.net/outstock/wp-content/uploads/2018/03/Untitled-1.jpg" alt="">
      </div>
    </div>
  </div>
</section> -->
  <!-- shopping by styles end  -->

<!-- benefs start  -->
<div class="benefit-cards-wrapper">
  <div class="benefit-cards-wrapper-inner container">
    <div class="benefits-area-banner">
      <img data-src="https://images.pexels.com/photos/1129413/pexels-photo-1129413.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
    </div>
    <div class="benefit-cards">
      <div class="benefit-card">
        <i class="bi bi-info-square"></i>
        <h2>უფასო მიწოდება სრულ სერვისზე</h2>
        <p>Your new FEST piece comes with a 3-Year Warranty, including at-home repair service.</p>
      </div>
      <div class="benefit-card" style="background: #E8F6F3;">
      <i class="bi bi-info-circle"></i>
        <h2>გადაიხადეთ ონლაინ</h2>
        <p>Your new FEST piece comes with a 3-Year Warranty, including at-home repair service.</p>
      </div>
      <div class="benefit-card" style="background: #FBEEE6;">
      <i class="bi bi-optical-audio"></i>
        <h2>2000 ზე მეტი დასახელების პროდუქტი</h2>
        <p>Your new FEST piece comes with a 3-Year Warranty, including at-home repair service.</p>
      </div>
      <div class="benefit-card" style="background: #FEF9E7;">
      <i class="bi bi-vr"></i>
        <h2>ისარგებლეთ განვადებით</h2>
        <p>Your new FEST piece comes with a 3-Year Warranty, including at-home repair service.</p>
      </div>
    </div>
  </div>
</div>
<!-- benefs end  -->

<!-- partners section start  -->
<div class="partners-section">
  <div class="partners-section-inner container">
    <div class="partners-slider">
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/3.jpg" alt="">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/4.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/6.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/7.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/4.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/9.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/4.jpg" alt="Lazy Owl Image">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="https://rubiktheme.com/demo/rb_davici_demo/img/m/9.jpg" alt="Lazy Owl Image">
      </div>
    </div>
  </div>
</div>
<!-- partners section end -->

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
      <!-- <div class="mapouter">
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
    </div> -->
    </div>
  </div>
</footer>
<!-- footer end  -->

<section class="header-mobile-fix">
  <div class="mobile-fix-inner container">
    <div class="mobile-menu-item">
      <i class="bi bi-search"></i>
    </div>
    <div class="mobile-menu-item">
      <i class="bi bi-layout-split"></i>
    </div>
    <div class="mobile-menu-item">
      <i class="bi bi-heart"></i>
    </div>
    <div class="mobile-menu-item">
      <i class="bi bi-person-circle"></i>
    </div>
  </div>
</section>

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

          $(".ecommerce-slider").trigger('owl.play',2000)

          $(".category-slider-road").owlCarousel({
            items : 5,
            lazyLoad : true,
            navigation : true,
          });
    
          $(".partners-slider").owlCarousel({
            items : 5,
            lazyLoad : true,
            navigation : false,
          });
          $(".partners-slider").trigger('owl.play',2000)
        })

        $(".category-menu-button").click(() => {
          $('.category-dropdown-menu').slideToggle()
        })

        if(localStorage.getItem("added")){

          $('.popup-message-body').text("პროდუქტი დაემატა კალათში")
          $('.alert-popup').show()
          localStorage.removeItem("added")
          setTimeout(() => {
            $('.alert-popup').hide()
          }, 2000);

        }else if(localStorage.getItem("present")){

          $('.popup-message-body').text("პროდუქტი უკვე არსებობს კალათში")
          $('.alert-popup').show()
          localStorage.removeItem("present")
          setTimeout(() => {
            $('.alert-popup').hide()
          }, 2000);

        }
    </script>
</body>
</html>