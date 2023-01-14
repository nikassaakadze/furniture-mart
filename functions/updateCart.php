<?php
  include('C:\xampp\htdocs\ecommerce\includes\connect.php');
  global $conn;
 $ipAdd = getIPAddress();
  if(isset($_POST['product'])){
    $quantity = $_POST['qunatity'];
    $productId= $_POST['product'];
    if($quantity == 0 || $quantity < 0 || !is_numeric($quantity)){
      header('Location: http://localhost/ecommerce/cart.php');
    }else{
      $update_cart = "update `cart` set quantity=$quantity where ip_address = '$ipAdd' && product_id = '$productId' ";
      $update = mysqli_query($conn, $update_cart);
    }
  }
  if(isset($_POST['removeItem'])){
    $_id= $_POST['removeItem'];
    $delete_query = "DELETE FROM `cart` WHERE product_id = $_id ";
    $delete_product = mysqli_query($conn, $delete_query);
  }
  if(isset($_POST['data'])){
    foreach($_POST['data'] as $remove_id){
      $delete_query = "delete from `cart` where product_id = $remove_id ";
      $delete_product = mysqli_query($conn, $delete_query);
    }
  }

?>
