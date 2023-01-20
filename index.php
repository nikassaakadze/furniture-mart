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
  <title>ავეჯის მაღაზია || მთავარი გვერდი</title>

  <!-- set favicon -->
  <link rel="icon" type="image/png" href="./assets/ico/favicon.png">

  <!-- import local css file  -->
  <link rel="stylesheet" href="css/bundle.css">
  
  <!-- import bootstrap icons   --CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>

<div class="preloader">
  <img src="./assets/images/loader.gif" alt="">
</div>

<!-- add to cart message start  -->
<div class="alert-popup"> 
  <span class="popup-message-body"></span> 
</div>
<!-- add to cart message end  -->

<!-- hidden responsive serch  bar  -->
<div class="search-responsive-nav">
  <div class="search-responsive-nav-inner container">
  <form class="main-search-form d-flex-aic" action="./search.php" >
    <input name="search" placeholder="საძიებო სიტყვა..." class="search-input" type="search">
    <button class="search-button"  type="submit">
      <i class="bi bi-search"></i>
    </button>
  </form>
  </div>
</div>
<!-- hidden responsive serch  bar  -->

<!-- site main header start  -->
<div class="main-header">
  <header class="main-header-inner container d-flex-aic-jcsb">
    <div class="menu-icon-hidden">
      <i class="bi bi-list"></i>
    </div>
    <div class="header-left-drawer">
      <div class="logo-drawer">
        <a href="./index.php">
          <img src="./assets/svg/logo.svg" alt="">
        </a>
      </div>
    </div>
    <div class="header-middle-drawer d-flex-aic">
      <nav class="status-bar-navigation">
        <ul class="status-bar-navigation-list d-flex">
          <li class="bar-navigation-list-item">
            <a href="./index.php">მთავარი</a>
          </li>
          <li class="bar-navigation-list-item">
            <a href="./shop.php">შოპინგი</a>
          </li>
          <li class="bar-navigation-list-item">
            <a href="">დახმარება</a>
          </li>
          <li class="bar-navigation-list-item">
            <a href="">მისამართი</a>
          </li>
        </ul>
      </nav>
      <form class="main-search-form d-flex-aic" action="./search.php" >
        <input name="search" placeholder="საძიებო სიტყვა..." class="search-input" type="search">
        <button class="search-button"  type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
    <div class="header-right-drawer d-flex">
      <div class="activity-drawer register d-flex-aic">
      <?php
          if(isset($_SESSION['username'])){
            ?>
             <div class="user-logged-in d-flex-aic">
              <div class="user-avatar">
                <img src="./assets/images/avatar.png" alt="">
              </div>
              <small><?= $_SESSION['username']?></small>
              <small class="log-out">
                <a href="./functions/logout.php?"><i class="bi bi-box-arrow-in-left"></i></a>
              </small>
            </div>
          <?php } else{
          echo "
            <a href='./login.php'>
              <span><i class='bi bi-person-circle'></i></span>
            </a>
          ";
          } ?>
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

</div>

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

<section class="products-slider-banner">
  <div class="slider-banner-inner">
    <div class="slider-banner-item">
      <div class="banner-item-hero">
        <img data-src="./assets/images/kitchen-room.jpg" alt="">
      </div>
      <div class="banner-item-text">
        <div class="banner-item-text-inner">
          <h1 class="banner-description-typography-headline zoom-out-right">სამზარეულო</h1>
          <h4 class="banner-description-typography-subheadline">დიდი ფასდაკლება სამზარეულოს კოლექციაზე</h4>
          <div class="banner-item-buttons d-flex-aic">
            <div class="banner-btn-act">
              <a href="./shop.php">კოლექცია</a>
            </div>
            <div class="banner-btn-act">
              <a href="">შეძენა</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-banner-item">
      <div class="banner-item-hero">
        <img data-src="./assets/images/bedroom.jpg" alt="">
      </div>
      <div class="banner-item-text">
        <div class="banner-item-text-inner">
          <h1 class="banner-description-typography-headline">საძინებელი</h1>
          <h4 class="banner-description-typography-subheadline">დიდი ფასდაკლება საძინებლის კოლექციაზე</h4>
          <div class="banner-item-buttons d-flex-aic">
            <div class="banner-btn-act">
              <a href="./shop.php">კოლექცია</a>
            </div>
            <div class="banner-btn-act">
              <a href="">შეძენა</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-banner-item">
      <div class="banner-item-hero">
        <img data-src="./assets/images/acceptable-room.jpg" alt="">
      </div>
      <div class="banner-item-text">
        <div class="banner-item-text-inner">
          <h1 class="banner-description-typography-headline">აივანი</h1>
          <h4 class="banner-description-typography-subheadline">დიდი ფასდაკლება აივნის კოლექციაზე</h4>
          <div class="banner-item-buttons d-flex-aic">
            <div class="banner-btn-act">
              <a href="./shop.php">კოლექცია</a>
            </div>
            <div class="banner-btn-act">
              <a href="">შეძენა</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- categories slider start  -->
<div class="category-slider">
  <div class="category-slider-road container" >
    <?php categorySlider(); ?>
  </div>
</div>
<!-- categories slider  end -->

<!-- products feed start -->
<section class="product-feed">
  <div class="product-feed-inner container">
    <div class="product-cards-area">
      <?php
        $select_products = "Select * from  `products` order by rand() LIMIT 0,12";
        $result = mysqli_query($conn, $select_products);
          while($row_data = mysqli_fetch_assoc($result)){
            $avaliable = $row_data['avaliable'];
            ?>
            <div class='product-card'>
              <a href='./product.php?product=<?= $row_data['_id'] ?>&color=<?= $row_data['color'] ?>' class='btn list-group-item-primary'>
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
              <div class='product-card-info'>
                <h4 class='product-card-name'><?= $row_data['name'] ?></h4>
                <div class="product-card-drawer d-flex-aic-jcsb">
                <h6 class='product-card-price'>
                  <span class="valuta-icon">GEL</span>
                 - <?= $row_data['price'] ?>.00</h6>
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
              </div>
              <div class="product-card-tocart add-to-cart-btn d-flex-aic-jcc" data-id="<?= $row_data['_id'] ?>">
                <i class="bi bi-bag"></i>
              </div>
          </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- products feed end -->

<!-- shopping by styles start  -->
<section class="shop-by-styles">
  <div class="shop-by-styles-inner container">
    <div class="style-banner-window">
      <div class="styles-banner-info">
        <h1>აქსესუარები​</h1>
        <h5>შეიძინეთ მისაღები ოთახის აქსესუარები</h5>
        <a href="./shop.php" class="shop-btn">შეიძნეთ ახლავე</a>
      </div>
      <div class="byStyle-banner-hero">
        <img data-src="./assets/images/livingroomacc.jpg" alt="">
      </div>
    </div>
    <div class="style-banner-window small-window">
      <div class="styles-banner-info">
        <h1>არ ჩამორჩეთ სტილს​</h1>
      </div>
      <div class="byStyle-banner-hero">
        <img data-src="./assets/images/green-pin.jpg" alt="">
      </div>
    </div>
  </div>
</section>
<!-- shopping by styles end  -->

<section class="details-item">
  <div class="details-item-inner container">
    <div class="details-item-drawer">
      <div class="details-hero">
        <img data-src="./assets/images/details.png" alt="">
        <div class="detail-stick details-stick-lamp d-flex-aic-jcc">
        <span>+</span>
        <div class="details-stick-info d-flex">
          <div class="details-stick-info-hero">
            <img src="" alt="">
          </div>
          <div class="details-stick-info-body">
            <h6>ლამპა</h6>
            <p>
              დაბალი ნათების დასადგამი ლამპა
            </p>
          </div>
        </div>
      </div>
        <div class="detail-stick details-stick-sofa d-flex-aic-jcc">
        <span>+</span>
        <div class="details-stick-info d-flex">
          <div class="details-stick-info-hero">
            <img src="" alt="">
          </div>
          <div class="details-stick-info-body">
            <h6>ლამპა</h6>
            <p>
              დაბალი ნათების დასადგამი ლამპა
            </p>
          </div>
        </div>
      </div>
      </div>
      <div class="details-description">
        <i class="bi bi-snow2"></i>
        <h1>ზამთარი</h1>
        <h3>როგორ შევხვდეთ ზამთარს: დეკორის და ინტერიერის ტრენდები 2023 წლისთვის</h3>
      </div>
    </div>
  </div>
</section>

<!-- partners section start  -->
<div class="partners-section">
  <div class="partners-section-inner container">
    <div class="partners-slider">
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/1.jpg" alt="">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/2.jpg" alt="1">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/1.jpg" alt="2">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/2.jpg" alt="3">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/1.jpg" alt="4">
      </div>
      <div class="partner-item">
        <img class="lazyOwl" data-src="./assets/images/2.jpg" alt="5">
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

<section class="header-mobile-fix">
  <div class="mobile-fix-inner container">
    <div class="mobile-menu-item search-item-clickable">
      <i class="bi bi-search"></i>
    </div>
    <div class="mobile-menu-item">
      <a href="./shop.php">
        <i class="bi bi-layout-split"></i>
      </a>
    </div>
    <div class="mobile-menu-item">
      <a href="./cart.php">
        <i class="bi bi-cart"></i>
      </a>
    </div>
  </div>
</section>

<div class="popup-overlay">
  <div class="popup">
    <p>ქუქი არის პატარა ფაილი, რომელსაც ჩვენი ვებსაიტი უგზავნის თქვენს მოწყობილობას,  ქუქი-ფაილები გვეხმარება მომხმარებლის მონაცემების დამუშავებაში.</p>
    <div>
    <a href="javascript:;" class="close">ვეთანხმები</a>
    <a href="javascript:;" class="submit">არ ვეთანხმები</a>
    </div>
  </div>
</div>

  <!-- local imports  -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="./javascript/main.js"></script>
  <script src="./javascript/owl.js"></script>
      <script>

        $(document).ready(function() {

          $('.add-to-cart-btn').click(function(){
          var product = $(this).attr('data-id')
          $.ajax({
            type: 'POST',
            url: './functions/addToCart.php',
            data: {'quantity': 1,'add_to_cart': product},
            beforeSend: function(){

            },
            success:  function(data){
                $('.alert-popup').show()
                $('.popup-message-body').text(data)

                setTimeout(() => {
                  $('.alert-popup').hide()
                }, 2000);


            }
          })
        })

          $(".slider-banner-inner").owlCarousel({
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

          $(".slider-banner-inner").trigger('owl.play',3000)

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
    </script>
</body>
</html>