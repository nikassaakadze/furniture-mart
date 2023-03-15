<?php
  include('C:\xampp\htdocs\ecommerce\includes\connect.php');

if(isset($_POST['csinfo']) && isset($_POST['product'])){
  
  $csinfo = $_POST['csinfo'];
  $product = $_POST['product'];
  $insert_query = "INSERT INTO `customizations` (csinfo, product) VALUES ('$csinfo', '$product')";
  $result = mysqli_query($conn, $insert_query);

}
?>