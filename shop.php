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

<!-- products feed start -->
<section class="product-feed">
  <div class="product-feed-inner container">
    <div class="feed-section-headline">
      <h1 class="section-hd-typography">შოპინგი</h1>
      <div class="breadcrumb">
      <span><a style="color: #bd8448;" href="index.php">მთავარი</a></span>
        <small><i class="bi bi-chevron-right"></i></small>
        <span>შოპინგი</span>
      </div>
    </div>
    <div class="shop-page-wrapper">
      <div class="shop-page-header">
        <div class="shop-page-filters-header"></div>
        <div class="shop-page-options">
          <div class="grid-options d-flex-aic">


            <div class="grid-option-select grid-by-2  active">
              <img src="./assets/svg/grid-2.svg" alt="">
            </div>
            <div class="grid-option-select grid-by-3 opacity">
              <img src="./assets/svg/grid-3.svg" alt="">
            </div>
            <div class="grid-option-select grid-by-4 opacity">
              <img src="./assets/svg/grid-4.svg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="shop-page-content">
        <div class="shop-page-filters">
        <div class="shop-page-widget category-widget">
            <div class="widget-headline">
              <h2>კატეგორიის მიხედვით</h2>
            </div>
            <div class="widget-content">
              <ul class="d-flex-fdc">
                <?php
                  $select_categories = "Select * from  `categories`";
                  $result = mysqli_query($conn, $select_categories);
                  while($row_data = mysqli_fetch_assoc($result)){
                    $category_name = $row_data['category_name'];
                    $category_id = $row_data['_id'];
                    echo " <li class='category-widget_category-listItem'><a href='./category.php?category=$category_id'>$category_name</a></li>";
                  }
                ?>
              </ul>
            </div>
          </div>
        <div class="shop-page-widget price-widget">
            <div class="widget-headline">
              <h2>ფასის დაყენება</h2>
            </div>
            <div class="widget-content">
              <div class="range-slider">
                <div class="progress"></div>
                <span class="range-min-wrapper">
                  <input class="range-min" type="range" min="1" max="100" value="1">
                </span>
                <span class="range-max-wrapper">
                  <input class="range-max" type="range" min="1" max="100" value="100">
                </span>
              </div>
              <div class="prive-filter-range-val d-flex-aic">
                <span class="range-text-typogr">დიაპაზონი:</span>
                <div class="price-ranges d-flex-aic">
                  <div class="min-value numberVal">
                    <span>$</span>
                    <input type="button" class="price-val-field" min="0" max="100" value="1" disabled>
                  </div>
                  <div class="max-value numberVal">
                    <span>$</span>
                    <input type="button" class="border text-center price-val-field" min="1" max="100" value="100" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="shop-page-widget color-widget">
            <div class="widget-headline">
              <h2>ფერის მიხედვით</h2>
            </div>
            <div class="widget-content widget-body_color-list">
              <ul class="d-flex-fdc">
                <?php
                    $select_categories = "Select * from  `colors`";
                    $result = mysqli_query($conn, $select_categories);
                    while($row_data = mysqli_fetch_assoc($result)){
                      $color = $row_data['color'];
                      echo "
                        <li class='d-flex-aic'>
                        <div class='color-circle' style='background: $color '></div>
                        <span>$color</span>
                      </li>
                      ";
                    }
                  ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="shop-page-cards">
        <?php
          $select_products = "Select * from  `products`";
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
        <?php } ?>
      </div>
      </div>
    </div>
  </div>
</section>
<!-- products feed end -->

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
        
        $(".add-to-cart-button").on("click", () => {
          localStorage.setItem("reloading", "true");
        } )

        if(localStorage.getItem("reloading")){
          $('.alert-popup').show()
          localStorage.removeItem("reloading")
          setTimeout(() => {
            $('.alert-popup').hide()
          }, 1000);
        }
    </script>
    <script>
    $(document).ready(function(){
      $('grid-options grid-option-select').click(function(){
        $('grid-option-select').removeClass("active");
        $(this).addClass("active");
    });
    });

      // $('.grid-by-2').click(() => {
      //   $('.shop-page-cards').removeClass('grid-cards-by-3')
      //   $('.shop-page-cards').removeClass('grid-cards-by-4')
      //   $('.shop-page-cards').removeClass('grid-cards-by-4')
      // })
      // $('.grid-by-3').click(() => {
      //   $('.shop-page-cards').removeClass('grid-cards-by-4')
      //   $('.shop-page-cards').addClass('grid-cards-by-3')
      // })
      // $('.grid-by-4').click(() => {
      //   $('.shop-page-cards').removeClass('grid-cards-by-3')
      //   $('.shop-page-cards').addClass('grid-cards-by-4')
      // })
    </script>
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