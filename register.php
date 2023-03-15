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
  <div class="user_area">
    <div class="user_area_inner container">
      <div class="user_logo">
        <a href="./index.php">
          <img src="./assets/svg/logo.svg" alt="">
        </a>
      </div>
      <form action="" class="user_area_form">
        <div class="custom-label">
          <input class="user-email" type="text" placeholder="Your Mail">
        </div>
        <div class="custom-label">
          <input class="user-name" type="text" placeholder="Your name">
        </div>
        <div class="custom-label">
          <input class="user-pass" type="password" placeholder="Password">
        </div>
        <div class="custom-label">
          <input class="user-phone" type="text" placeholder="Mobile number">
        </div>
        <button class="form-register__btn" name="authorization">
          <span>Register</span>
          <i class="bi bi-box-arrow-in-right"></i>
        </button>
        <span class="no-user"></span>
        <div class="no-acc">
          <span>You You already have an account?</span>
          <a href="./login.php">Log In</a>
        </div>
      </form>
      <small class="attention">*ეს არის სატესტო ფორმა, ველების (მაგ. მეილის ვალიდურობა) არ არის შემოწმებული</small>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="./javascript/javascript.js"></script>
  <script>
      $(document).ready(function() {
        $('.form-register__btn').click(function(e){
          e.preventDefault()
          var thisInput = $(this).parent(".user_area_form").find( $('input') );
          for(let i=0; i<thisInput.length; i++){
            if(thisInput[i].value == ''){
              e.preventDefault()
              var parent = $(thisInput[i]).parent('.custom-label').find($('.empty-field-attention'))
              if(parent.length == 0){
                var attention = $(thisInput[i]).attr('placeholder') + ' Is ' + 'Empty'
                $(`<p class='empty-field-attention' > ${attention} </p>`).insertBefore(thisInput[i])
              }
            }
          }
          var _isAttenion = $(".user_area_form").find($('.empty-field-attention'))
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