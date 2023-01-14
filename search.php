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
  <title>ავეჯის მაღაზია || ძებნა</title>
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

<div class="feed-section-headline">
  <h1 class="section-hd-typography">ძებნა</h1>
  <div class="breadcrumb">
  <span><a style="color: #bd8448;" href="index.php">მთავარი</a></span>
    <small><i class="bi bi-chevron-right"></i></small>
    <span>ძებნა</span>
  </div>
</div>

  <section class="search-result-page">
    <div class="search-result-page-inner container">
    <?php
      if(isset($_GET['search']) && ! $_REQUEST['search'] == '' ){
        $search_keyword = $_GET['search'];
        $search_query = "
          Select * from  `products` where name  like '%$search_keyword%' ";
          $result = mysqli_query($conn, $search_query);
          $numOfRows = mysqli_num_rows($result);
        ?>
        <div class="search-area-keyowrd d-flex-aic">
          <h1>მოიძებნა <?=$numOfRows?> შედეგი (<mark><?= $_GET['search'] ?></mark>) </h1>
          <div class="price-filter d-flex-aic">
            <span>ფასის ფილტრი:</span>
            <div class="price-filter-inputs d-flex-aic">
              <div class="input-field">
                <span>₾:</span>
                <input type="number" placeholder="1" class="min-price" >
              </div>
              <div class="input-field">
                <span>₾:</span>
              <input type="number" placeholder="1000" class="max-price" >
              </div>
              <button class="price-filter-btn" name='<?= $_GET['search'] ?>'>გაფილტრვა</button>
            </div>
          </div>
      </div>
      <div class="product-cards-area search-result-cards">
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
            <div class='flip-card'>
              <div class='flip-card-inner'>
                <div class='flip-card-front'>
                  <img src='./admin/images/<?= $row_data['hero_1'] ?>' class='card-img-top' alt=''>
                </div>
                <div class='flip-card-back'>
                  <img src='./admin/images/<?= $row_data['hero_2'] ?>' class='card-img-top' alt=''>
                </div>
              </div>
            </div>
          </a>
          <div class='product-card-info'>
            <h4 class='product-card-name'><?= $row_data['name'] ?></h4>
          </div>
          <div class="product-card-drawer d-flex-aic-jcsb">
          <h6 class='product-card-price'><span class="valuta-icon">₾</span> - <?= $row_data['price'] ?>.00</h6>
            <?php
            if ($row_data['avaliable'] > 0) {
              echo "
                  <div class='product-card-avaliability'>
                    <span>მარაგშია: $avaliable</span>
                  </div>
                ";
            } else {
              echo "
                  <div class='product-card-avaliability not-avalibale'>
                    <span>მარაგი ამოიწურა</span>
                  </div>
                ";
            }
            ;
            ?>
          </div>
          <div class="product-card-tocart add-to-cart-btn d-flex-aic-jcc" data-id="<?= $row_data['_id'] ?>">
            <i class="bi bi-bag"></i>
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

  <div class="subscribe">
    <div class="subscribe-inner">
      <div class="subscribe-banner-circle d-flex-aic-jcc">
        <i class="bi bi-envelope-paper-fill"></i>
      </div>
      <div class="subscribe-block d-flex-aic-jcc">
        <div class="subscribe-banner-text">
          <h1 class="registr-typography">დარეგისტრირდით და მიიღეთ 25% იანი ფასდაკლება</h1>
        </div>
      </div>
      <div class="subscribe-form d-flex-aic-jcc">
        <span class="d-flex-fdc">
          <h4>გამოიწერეთ სიახლები</h4>
          <form class="form-email-confirm d-flex-aic" action="">
            <input class="subs-input" type="text" placeholder="მეილი...">
            <input class="subs-btn" type="button" value="გამოწერა">
          </form>
        </span>
      </div>
    </div>
    <div class="subscribe-area-hero">
      <img src="https://ciri.la-studioweb.com/wp-content/uploads/2022/09/m1-project-1.jpg" alt="">
    </div>
  </div>

  <div class="subscribe-success-modal">
    <div class="subscribe-success-modal-inner">
      <div class="confirm-status"></div>
    </div>
  </div>

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
  <script src="./javascript/URIjs.js"></script>
  <script src="./javascript/main.js"></script>
  <script>
    $(document).ready(function() {

      $('.add-to-cart-btn').click(function(){
          var product = $(this).attr('data-id')
          $.ajax({
            type: 'POST',
            url: 'functions/addToCart.php',
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

      $('.subs-btn').click(function() {
        var emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if($('.subs-input').val() == ""){
          if($('.empty-field-attention').length < 1){
            $( "<p class='empty-field-attention'>შეავსეთ მეილის ველი</p>" ).insertBefore($('.form-email-confirm'))
          }
        }else if(!emailPattern.test($('.subs-input').val())){
          if($('.empty-field-attention').length < 1){
            $( "<p class='empty-field-attention'>შეუსაბამო მეილი</p>" ).insertBefore($('.form-email-confirm'))
          }else{
            $( ".empty-field-attention").text('შეუსაბამო მეილი')
          }
        }
        else{
          $('.subscribe-success-modal').animate({width: 'show'})
            function emailCOnfirmPending(){
              return new Promise(resolve => {
              setTimeout(() => {
                resolve('resolved');
              }, 3000);
            });
            }
            async function asyncCall() {
            $('.confirm-status').html(`<img class="my-loader-spin" src="./assets/svg/loader.svg" >`)
            const result = await emailCOnfirmPending();
            $('.confirm-status').html(
              `
                <div class="success-message">
                  <h1>სიახლეები გამოწერილია</h1>
                  <img class="my-loader-spin-result-success" src="./assets/images/tick.png" >
                </div>
              `
            )
            await setTimeout(() => {
              $('.subscribe-success-modal').hide()
              $('.subs-input').val('')
              $( ".empty-field-attention").hide()
              }, 1000);
          }
          asyncCall()
        }
      })

      $('.price-filter-btn').click(function(){
        var parseqrst = URI(document.URL).query(true)
        var minPrice = $('.max-price').val()
        var maxPrice = $('.min-price').val()
        if(minPrice != "" && maxPrice != ""){
          $.ajax({
          type: "POST",
          url: "functions/filter.php",
          data: {
            'max': maxPrice,
            'min': minPrice,
            'search_keyword': parseqrst.search
          },
          success: function(data){
            $('.search-result-cards').html(data)
          }
        })
        }
      })
    })
    </script>
</body>
</html>