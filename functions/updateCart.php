<?php
  include('../includes/connect.php');
  global $conn;
  session_start();
 $ip = getIPAddress();
  if(isset($_POST['product'])){
    $quantity = $_POST['qunatity'];
    $productId= $_POST['product'];
      $update_cart = "update `cart` set quantity=$quantity where product_id = '$productId' ";
      if(isset($_SESSION['user'])){
        $update_cart .="AND user IN('".$_SESSION['user']."')";
      }
      else{
        $update_cart .="AND ip_address IN('$ip')";
      }
      $update = mysqli_query($conn, $update_cart);
  }
  if(isset($_POST['removeItem'])){
    $_id= $_POST['removeItem'];
    $delete_query = "DELETE FROM `cart` WHERE product_id = $_id  ";
    if(isset($_SESSION['user'])){
      $delete_query .="AND user IN('".$_SESSION['user']."')";
    }
    else{
      $delete_query .="AND ip_address IN('$ip')";
    }
    $delete_product = mysqli_query($conn, $delete_query);
  }
  if(isset($_POST['data'])){
    foreach($_POST['data'] as $remove_id){
      $delete_query = "delete from `cart` where product_id = $remove_id ";
      $delete_product = mysqli_query($conn, $delete_query);
    }
  }

?>
