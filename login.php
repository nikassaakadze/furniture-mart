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
  <title>ავეჯის მაღაზია || ავტორიზაცია</title>
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
    <div class="form-area-heading">
      <div class="feed-section-headline">
        <h1 class="section-hd-typography">ავტორიზაცია</h1>
        <div class="breadcrumb">
        <span><a style="color: #bd8448;" href="index.php">მთავარი</a></span>
          <small><i class="bi bi-chevron-right"></i></small>
          <span>ავტორიზაცია</span>
        </div>
      </div>
    </div>
    <div class="tabs">
    <div id="tabs-content">
      <div id="tab1" class="tab-content">
        <form action="" class="user-form">
        <div class="custom-label">
          <input class="user-email" type="text" placeholder="მეილი">
        </div>
        <div class="custom-label">
          <input class="user-pass" type="password" placeholder="პაროლი">
        </div>
        <button class="form-register__btn" name="authorization">
          <span>ავტორიზაცია</span>
          <i class="bi bi-box-arrow-in-right"></i>
        </button>
        <span class="no-user"></span>
        <div class="no-acc">
          <span>არ გაქვთ ანგარიში?</span>
          <ul id="tabs-nav">
            <li><a href="#tab2">რეგისტრაცია</a></li>
          </ul> 
        </div>
      </form>
      </div>
      <div id="tab2" class="tab-content">
        <form action="" class="user-form">
        <div class="custom-label">
          <input class="user-name" type="text" placeholder="სახელი">
        </div>
        <div class="custom-label">
          <input class="user-email" type="text" placeholder="მეილი">
        </div>
        <div class="custom-label">
          <input class="user-phone" type="text" placeholder="მობილური">
        </div>
        <div class="custom-label">
          <input class="user-pass" type="password" placeholder="პაროლი">
        </div>
        <button class="form-register__btn">
          <span>გერისტრაცია</span>
          <i class="bi bi-box-arrow-in-right"></i>
        </button>
        <span class="no-user"></span>
        <div class="no-acc">
          <span>უკვე გაქვთ ანგარიში?</span>
          <ul id="tabs-nav">
            <li><a href="#tab1">გაიარეთ ავტორიზაცია</a></li>
          </ul> 
        </div>
      </form>
      </div>
    </div>
  </div>
    
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
    <script>
      $(document).ready(function() {

        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
          $('.tab-content').hide();
          
          var activeTab = $(this).find('a').attr('href');
          $(activeTab).fadeIn();
          return false;
        });

        $('.form-register__btn').click(function(e){
          e.preventDefault()
          var thisInput = $(this).parent(".user-form").find( $('input') );
          for(let i=0; i<thisInput.length; i++){
            if(thisInput[i].value == ''){
              e.preventDefault()
              var parent = $(thisInput[i]).parent('.custom-label').find($('.empty-field-attention'))
              if(parent.length == 0){
                var attention = $(thisInput[i]).attr('placeholder') + 'ს ' + 'ველი ცარიელია'
                $(`<span class='empty-field-attention' > ${attention} </span>`).insertBefore(thisInput[i])
              }
            }else{
              var useremail = $('.user-email').val()
              var userpass = $('.user-pass').val()
              var userphone = $('.user-phone').val()
              var username = $('.user-name').val()
              $.ajax({
                type: "POST",
                url: 'functions/auth.php',
                data: {'email': useremail, 'password': userpass,'username': username, 'userphone': userphone },
                beforeSend: function(){
                  $('.form-register__btn').text("მუშავდება")
                },
                success: function(data){
                $('.no-user').html(data)
                $('.form-register__btn').html(`
                  <span>ავტორიზაცია</span>
                  <i class="bi bi-box-arrow-in-right"></i>
                `)
              }
              })
            }
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
  <span>თქვენ უკვე გავლილი გაქვთ ავტორიზაცია</span>
    <a href='./index.php'><button>მთავარ გვერდზე დაბრუნება</button></a>
  ";
  } ?>