<?php
  include('./includes/connect.php');

  function categorySlider(){

    global $conn;
    
    $select_category = "Select * from  `categories`";
    $result = mysqli_query($conn, $select_category);

    while($row_data = mysqli_fetch_assoc($result)){

      $_id = $row_data['_id'];
      $category_name = $row_data['category_name'];
      $category_hero = $row_data['category_hero'];

      echo "
      <div class='category-item'>
        <div class='category-item-content'>
          <a href='./category.php?category=$_id' >
            <img data-src='./admin/images/category/$category_hero' class='card-img-top lazyOwl' alt=''>
            <h5>  $category_name </h5>
          </a>
        </div>
      </div>
    ";
  } 
}
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
function addToCart(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $product_id = $_GET['add_to_cart'];
    $select_query = "Select * from `cart` where ip_address = '$ip' and product_id = $product_id ";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows > 0){
      echo "<script>localStorage.setItem('present', 'true');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }else{
      $insert_query= "insert into `cart` (product_id,ip_address, quantity) values($product_id, '$ip', 1)";
      $result_query = mysqli_query($conn, $insert_query);
      echo "<script>localStorage.setItem('added', 'true');</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}
function getCart(){
  global $conn;
  $ip = getIPAddress();
  $select_query = "Select * from `cart` where ip_address = '$ip' ";
  $result_query = mysqli_query($conn, $select_query);
  $cart_items_length = mysqli_num_rows($result_query);
  echo $cart_items_length;
}


?>