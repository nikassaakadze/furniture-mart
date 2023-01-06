<?php
  include('C:\xampp\htdocs\ecommerce\includes\connect.php');
  global $conn;
  function getIPAddress(){ 
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
     $ip = $_SERVER['HTTP_CLIENT_IP'];  
   }
   elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   } 
   else{  
     $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
 }  
 $ipAdd = getIPAddress();
  if(isset($_POST['update_cart'])){
    $quantity = $_POST['qty'];
    $productId= $_POST['productID'];
    if($quantity == 0 || $quantity < 0 || !is_numeric($quantity)){
      header('Location: http://localhost/ecommerce/cart.php');
    }else{
      $update_cart = "update `cart` set quantity=$quantity where ip_address = '$ipAdd' && product_id = $productId ";
      $update = mysqli_query($conn, $update_cart);
      header('Location: http://localhost/ecommerce/cart.php');
    }
  }
  if(isset($_POST['remove_item_from_cart'])){
    $_id= $_POST['productID'];
    $delete_query = "delete from `cart` where product_id = $_id ";
    $delete_product = mysqli_query($conn, $delete_query);
    header('Location: http://localhost/ecommerce/cart.php');
  }
  if(isset($_POST['remove_multiple'])){
    foreach($_POST['removeitems'] as $remove_id){
      echo $remove_id;
      // $delete_query = "delete from `cart` where product_id = $remove_id ";
      // $delete_product = mysqli_query($conn, $delete_query);
    }
  }
  // header('Location: http://localhost/ecommerce_/cart.php');

?>
