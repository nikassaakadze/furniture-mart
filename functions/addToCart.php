<?php 
session_start();
  include('../includes/connect.php');
  
  if(isset($_POST['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $product_id = $_POST['add_to_cart'];
    $quantity = $_POST['quantity'];
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $select_query = "SELECT * FROM `cart` WHERE user = '$user' AND  product_id = $product_id ";
      $result_query = mysqli_query($conn, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      if($num_of_rows > 0){
        echo "The product already exists in the cart";
      }
      else{
        $insert_query= "INSERT INTO `cart` (product_id, quantity, user) VALUES('$product_id', '$quantity', '$user')";
        $result_query = mysqli_query($conn, $insert_query);
        echo "The product has been added to the cart";
      }
    }
    else {
      $select_query = "SELECT * FROM `cart` WHERE ip_address = '$ip' AND  product_id = $product_id ";
      $result_query = mysqli_query($conn, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      if($num_of_rows > 0){
        echo "The product already exists in the cart";
      }
      else{
        $insert_query= "INSERT INTO `cart` (product_id, quantity, ip_address) VALUES('$product_id', '$quantity', '$ip')";
        $result_query = mysqli_query($conn, $insert_query);
        echo "The product has been added to the cart";
      }
    }
  }

?>