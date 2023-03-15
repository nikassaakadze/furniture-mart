<?php
  function categorySlider(){

    global $conn;
    
    $select_category = "Select * from  `categories`";
    $result = mysqli_query($conn, $select_category);

    while($row_data = mysqli_fetch_assoc($result)){

      $_id = $row_data['_id'];
      $category_name = $row_data['category_name'];
      $category_hero = $row_data['category_hero'];

    echo "
          <div class='category_option'>
          <a href='./shop.php'>
            <div class='category_option_in'>
              <img src='./admin/images/category/$category_hero' alt=''>
              <h5>  $category_name </h5>
            </div>
          </a>
        </div>
      ";
  } 
}
function getCart(){
  global $conn;
  $ip = getIPAddress();
  
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $select_query = "SELECT * FROM `cart` WHERE user = '$user' ";
  }
  else{
    $select_query = "SELECT * FROM `cart` WHERE ip_address = '$ip' ";
  }

  $result_query = mysqli_query($conn, $select_query);
  $cart_items_length = mysqli_num_rows($result_query);
  echo $cart_items_length;
}

?>