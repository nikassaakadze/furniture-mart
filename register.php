<?php
  include("includes/connect.php");
  include("functions/common.php");
  session_start()
?>
<?php
  if(!isset($_SESSION['username'])){
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
                <img src="./assets/images/avatar.svg" alt="">
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

<!-- register area   -->
<section class="register-area">
  <div class="register-area-inner form-area container">
  <div class="breadcrumb">
      <span><a style="color: #9cc55a;" href="index.php">მთავარი</a></span>
      <small><i class="bi bi-chevron-right"></i></small>
      <span>რეგისტრაცია</span>
    </div>
    <form action="" class="user-form">
      <div class="custom-label">
        <input class="user-name" type="text" name="name" placeholder="სახელი">
      </div>
      <div class="custom-label">
        <input class="user-email" type="text" name="email" placeholder="მეილი">
      </div>
      <div class="custom-label">
        <input class="user-phone" type="text" name="mobile" placeholder="მობილური">
      </div>
      <div class="custom-label">
        <input class="user-pass" type="password" name="password" placeholder="პაროლი">
      </div>
      <button class="form-register__btn">
        <span>რეგისტრაცია</span>
        <i class="bi bi-box-arrow-in-right"></i>
      </button>
      <span class="no-user"></span>
      <div class="no-acc">
        <span>უკვე გაქვთ ანგარიში?</span>
        <a href="./login.php">გაიარეთ ავტორიზაცია</a>
      </div>
    </form>
    
  </div>
</section>
<!-- register area   -->

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

  <!-- local imports  -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="./javascript/main.js"></script>
    <script>
      $(document).ready(function() {
        $('.form-register__btn').click(function(e){
          e.preventDefault()
          var thisInput = $(this).parent(".user-form").find( $('input') );
          for(let i=0; i<thisInput.length; i++){
            if(thisInput[i].value === ''){
              var parent = $(thisInput[i]).parent('.custom-label').find($('.empty-field-attention'))
              if(parent.length == 0){
                var attention = $(thisInput[i]).attr('placeholder') + 'ს ' + 'ველი ცარიელია'
                $(`<p class='empty-field-attention' > ${attention} </p>`).insertBefore(thisInput[i])
              }
            }
          }
          var _isAttenion = $(".user-form").find($('.empty-field-attention'))
          if(! _isAttenion.length > 0){
              var useremail = $('.user-email').val()
              var userpass = $('.user-pass').val()
              var userphone = $('.user-phone').val()
              var username = $('.user-name').val()
              $.ajax({
                type: "POST",
                url: './functions/register.php',
                data: {'email': useremail, 'password': userpass, 'username': username, 'phone': userphone},
                beforeSend: function(){
                },
                success: function(data){
                $('.no-user').html(data)
                $('.form-register__btn').html()
              }
            })
          }
        })
        $('input').keyup(function(){
          if($(this).val() !== ''){
            $(this).parent(".custom-label").find('.empty-field-attention').remove()
          }
        })

      })
  </script>
</body>
</html>
  <?php } else{
  echo "
      <a href='./index.php'><button>მთავარ გვერდზე დაბრუნება</button></a>
  ";
  } ?>