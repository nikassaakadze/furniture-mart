<?php
  include('../includes/connect.php');
  global $conn;
if($_POST['username'] == ''){
  $password = $_POST['password'];
  $email = $_POST['email'];
  $ip = getIPAddress()
  ;
  $select_users = "SELECT * from `user` WHERE email = '$email' && password = '$password' ";
  $check_user = mysqli_query($conn, $select_users);
  $is_user_exists = mysqli_num_rows($check_user);

  if($is_user_exists > 0){

    while ($row_data = mysqli_fetch_assoc($check_user)) {
      $user_id = $row_data['user_id'];
      $update_cart = "UPDATE `cart` SET user=$user_id, ip_address = '' where ip_address = '$ip'  ";
      $update = mysqli_query($conn, $update_cart);

      session_start();
      $_SESSION["username"] = $row_data['username'];
      $_SESSION["user"] = $row_data['user_id'];
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }else{
    echo "მომხმარებელი ვერ მოიძებნა";
  }
}
if($_POST['username'] != ""){
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $name = $_POST['username'];
  
  $insert_user = "INSERT INTO `user` (username, password, user_phone, email) VALUES ('$name', '$password', '$phone','$email' ) ";
  $insert = mysqli_query($conn, $insert_user);
  session_start();
  $_SESSION["username"] = $name;
  echo "<script>window.open('index.php', '_self')</script>";
}

?>