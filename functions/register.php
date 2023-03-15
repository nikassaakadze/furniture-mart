<?php
  include('../includes/connect.php');
  global $conn;

if (isset($_POST['password']) && isset($_POST['email'])) {
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $name = $_POST['username'];
  $ip = getIPAddress();

  $select = "SELECT * from `user` WHERE email = '$email' ";
  $check = mysqli_query($conn, $select);
  $user_exists = mysqli_num_rows($check);

  if ($user_exists > 0) {
    echo "User with $email already exists";
  } else {

    $insert_user = "INSERT INTO `user` (username, password, user_phone, email) VALUES ('$name', '$password', '$phone','$email' ) ";
    $insert = mysqli_query($conn, $insert_user);

    if($insert){
      echo "Your profile has been created, please login";
    }
  }
}

?>