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
  <title>ავეჯის მაღაზია || პროდუქტის დეტალები</title>
  <!-- set favicon -->
  <link rel="icon" type="image/png" href="./assets/ico/favicon.png">

  <!-- import local css file  -->
  <link rel="stylesheet" href="css/bundle.css">
  
  <!-- import bootstrap icons   --CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>

<!-- add to cart message start  -->
<div class="alert-popup"> 
  <span class="popup-message-body"></span> 
</div>
<!-- add to cart message end  -->

<!-- hidden responsive serch  bar  -->
<div class="search-responsive-nav">
  <div class="search-responsive-nav-inner container"></div>
</div>
<!-- hidden responsive serch  bar  -->

<!-- site top bar start  -->
<div class="site-top-bar">
  <div class="d-flex-aic-jcsb top-bar-inner container">
    <div class="bar-inner-left">
      <span class="top-bar-item">
        <a href="#">
          <span>კონტაქტი</span>
          <i class="bi bi-person-lines-fill"></i>
        </a>
      </span>
      <span class="top-bar-item">
        <a href="#">
          <span>ხშირად დასმული კითხვები</span>
          <i class="bi bi-patch-question"></i>
        </a>
      </span>
      <span class="top-bar-item">
        <a href="#">
          <span>ბლოგი</span>
          <i class="bi bi-flower3"></i>
        </a>
      </span>
    </div>
    <div class="bar-inner-right d-flex">
      <span class="top-bar-item d-flex-aic">
        <a href="#">
          <i class="bi bi-headphones"></i>
          <span>+ 995 123 456</span>
        </a>
      </span>
      <span class="top-bar-item d-flex-aic">
        <a href="#">
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
        <div class="menu-icon-hidden">
          <i class="bi bi-list"></i>
        </div>
      </nav>
      <form class="main-search-form d-flex-aic" action="search.php" role="search">
        <input name="search" placeholder="საძიებო სიტყვა..." class="search-input" type="text">
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
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="">
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

  <div class="product-fullInfo-wrapper">
    <div class="product-fullInfo-inner container">  
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
                  <div class='product-description-drawer'>
                  <div class='ecommerce-gallery'>
              
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
                  <div class='product-specifications'>
                    <div class='product-name-sc'>
                      <h1><?= $row_data['name'] ?></h1>
                    </div>
                    <div class='product-price-sc'>
                      <h3>₾<?= $row_data['price'] ?>.00</h3>
                    </div>
                    <div class='product-sc-description'>
                      <p><?= $description ?></p>
                    </div>
                    <div class='product-customization-sc'>
                      <div class='product-cs-sc-headline d-flex-aic-jcsb'>
                        <span>თქვენზე მორგება</span>
                        <i class='bi bi-chevron-down'></i>
                      </div>
                      <div class='product-cs-sc-content'>
                        <h5>შეგიძლიათ გამოგვიგზავნოთ პროდუქტის თქვენეული ვერსია</h5>
                        <textarea class="cs-textarea" name='' cols='30' rows='10' placeholder='მგონი...'></textarea>
                        <button name="accept_customzt" class="send-customization">გაგზავნა</button>
                      </div>
                    </div>
                    <div class='product-sc-options'>
                      <div class='sc-option-size sc-option-colors d-flex-aic'>
                        <span class='inf-name'>ფერი:</span>
                        <ul class='d-flex'>
                          <?php
                            $select_colors = "Select * from  `colors` where _id = $color ";
                            $result_colors = mysqli_query($conn, $select_colors);
                              while($color_data = mysqli_fetch_assoc($result_colors)){
                                $color_name = $color_data['color'];
                                ?>
                                <li style='background: <?= $color_name ?>' class='size-option d-flex-aic-jcc'></li>
                              <?php } ?>
                        </ul>
                      </div>
                      <div class='sc-option-size sc-option-size d-flex-aic'>
                        <span class='inf-name'>ზომა:</span>
                        <ul class='d-flex'>
                          <?php
                            $select_size = "Select * from  `size` where _id = $size ";
                            $result_size = mysqli_query($conn, $select_size);
                              while($size_data = mysqli_fetch_assoc($result_size)){
                                $size_name = $size_data['size'];
                                ?>
                                  <li class='color-option d-flex-aic-jcc'> <?= $size_name ?></li>
                              <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class='product-sc-addto'>
                      <div class='product-toCart d-flex'>
                        <div class='quantity-inputgroups'>
                          <input class="cart-qty-minus" type='button' value='-'>
                          <input class="qty" value='1' type='button'>
                          <input class="cart-qty-plus" type='button' value='+'>
                        </div>
                        <?php
                          $cart_query = "Select * from `cart`";
                          $result = mysqli_query($conn, $cart_query);
                          while($row_data = mysqli_fetch_assoc($result)){
                            $id = $row_data['product_id'];
                          }
                        if(isset($id) && $id == $product_id){
                          echo " <a class='goto-cart-btn d-flex-aic' href='./cart.php'> კალათში გადასვლა <i class='bi bi-bag-check'></i></a>";
                        }else{
                          echo "<div class='add-to-cart-btn d-flex-aic' data-id='$product_id'> კალათში დამატება <i class='bi bi-bag-check'></i></div>";
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php                 
            }
          }
      ?>
    </div>
  </div>
  <div class="product-page-tabs">
  <div class="container">
    <div class="tabs">
    <ul id="tabs-nav">
      <li><a href="#tab1">მომხმარებლების მოსაზრებები</a></li>
      <li><a href="#tab2">მსგავსი პროდუქტები</a></li>
    </ul> 
    <div id="tabs-content">
      <div id="tab1" class="tab-content">
      <?php
      $select_csinfo = "SELECT * FROM  `customizations` WHERE product = $product_id ";
      $result_csinfo = mysqli_query($conn, $select_csinfo);
        while($csinfo = mysqli_fetch_assoc($result_csinfo)){
          
          ?>
          <p><?= $csinfo['csinfo'] ?></p>
        <?php } ?>
      
      </div>
      <div id="tab2" class="tab-content">
        </div>
    </div>
  </div>
  </div>
  </div>



<!-- footer start  -->
<footer class="site-footer">
  <div class="site-footer-inner container">
    <div class="footer-drawer">
      <div class="footer-logo">
        <img data-src="assets/svg/logo.svg" alt="">
      </div>
      <p class="footer-description"> ჩვენ გთავაზობთ 3000 ზე მეტი დასახელების მაღალი ხარისხის პროდუქციას. </p>
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
  <script src="./javascript/owl.js"></script>
  <script src="./javascript/URIjs.js"></script>
  <script src="./javascript/main.js"></script>
  <script>

  $(document).ready(function() {

    var incrementPlus;
    var incrementMinus;

    var buttonPlus  = $(".cart-qty-plus");
    var buttonMinus = $(".cart-qty-minus");

    var incrementPlus = buttonPlus.click(function() {
      var $n = $(this).parent(".quantity-inputgroups").find(".qty");
      $n.val(Number($n.val())+1 );
    });

    var incrementMinus = buttonMinus.click(function() {
      var $n = $(this).parent(".quantity-inputgroups").find(".qty");
      var amount = Number($n.val());
      if (amount > 1) {
        $n.val(amount-1);
      }
    });

    $('.add-to-cart-btn').click(function(){
      var product = $(this).attr('data-id')
      var quantity = $('.qty').val()
      $.ajax({
        type: 'POST',
        url: 'functions/addToCart.php',
        data: {'quantity': quantity,'add_to_cart': product},
        beforeSend: function(){

        },
        success:  function(data){
            $('.alert-popup').show()
            $('.popup-message-body').text(data)

             setTimeout(() => {
              $('.alert-popup').hide()
            }, 2000);
             setTimeout(() => {
              location.reload();
            }, 3000);


        }
      })
    })

  var parseqrst = URI(document.URL).query(true)
  $('.send-customization').click(() => {
    if($('.cs-textarea').val() == ''){
      $('.cs-textarea').css("border-color", "red")
    }else{
      $.ajax({
        type: "POST",
        url: "http://localhost/ecommerce/functions/insertcs.php",
        data:{
          csinfo: $('.cs-textarea').val(),
          product: parseqrst.product
        },
        success: function(){
          $('.cs-textarea').val('')
        }
      })
    }
  })
    
  // Show the first tab and hide the rest
  $('#tabs-nav li:first-child').addClass('active');
  $('.tab-content').hide();
  $('.tab-content:first').show();

  // Click function
  $('#tabs-nav li').click(function(){
    $('#tabs-nav li').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').hide();
    
    var activeTab = $(this).find('a').attr('href');
    $(activeTab).fadeIn();
    return false;
  });


  $(".product-cs-sc-headline").click(() => {
    $(".product-cs-sc-content").slideToggle()
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