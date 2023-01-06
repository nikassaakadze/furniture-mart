<?php
  include('../includes/connect.php');

  if(isset($_POST['insert_product'])){


    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_color = $_POST['product_color'];
    $product_size = $_POST['product_size'];
    $product_description = $_POST['product_description'];

    $hero_1 = $_FILES['hero_1']['name'];
    $hero_2 = $_FILES['hero_2']['name'];
    
    $tmp_hero_1 = $_FILES['hero_1']['tmp_name'];
    $tmp_hero_2 = $_FILES['hero_2']['tmp_name']; 

    if($product_name == '' 
      or $product_price == '' 
      or $hero_1 == '' 
      or $hero_2 == '' 
      or $product_category == ''
      or $product_color == '' 
      or $product_size == ''
      or $product_description == ''
      ){
        echo "<script>alert('empty')</script>";
        exit();
      }else{
        move_uploaded_file($tmp_hero_1, "./images/$hero_1");
        move_uploaded_file($tmp_hero_2, "./images/$hero_2");

      $insert_products = "insert into `products` (
        name, 
        price, 
        category,
        color,
        size,
        description,
        hero_1,	
        hero_2
      ) values(
        '$product_name',
        '$product_price',
        '$product_category',
        '$product_color',
        '$product_size',
        '$product_description',
        '$hero_1',
        '$hero_2'
      )";

    $result_query = mysqli_query($conn, $insert_products);
    if($result_query){
      echo "<script>alert('inserted')</script>";
    }

    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
    .space{
      width: 200px;
      margin-top: 3px;
      padding: 15px 40px;
      background: #eee;
    }
  </style>
<form action="" method="post" enctype="multipart/form-data">
<div class="space">
    <input placeholder="name" type="text" name="product_name">
    </div>
    <div class="space">
    <input placeholder="price" type="" name="product_price">
    </div>
    <div class="space">
    <input placeholder="description" type="text" name="product_description">
    </div>
    <div class="space">
    <select name="product_category" id="">
      <option value="Select Category">Select Category</option>
        <?php
          $select_categories = "Select * from  `categories`";
          $result = mysqli_query($conn, $select_categories);
            while($row_data = mysqli_fetch_assoc($result)){
              $category_name = $row_data['category_name'];
              $category_id = $row_data['_id'];
              echo "<option name='product_category' value='$category_id'> $category_name</option>";
            }
        ?>
        </select>
        </div>
        <div class="space">
      <select class='color' name="product_color" id="">
        <option  value="Select Color">Select Color</option>
          <?php
            $select_colors = "Select * from  `colors`";
            $result = mysqli_query($conn, $select_colors);
              while($row_data = mysqli_fetch_assoc($result)){
                $color_name = $row_data['color'];
                $color_id = $row_data['_id'];
                echo "<option class='color' style='background: $color_name' name='product_color' value='$color_id'> $color_name</option>";
              }
          ?>
          </select>
        </div>
        <div class="space">
      <select name="product_size" id="">
        <option  value="Select Color">Select Size</option>
          <?php
            $select_size = "Select * from  `size`";
            $result = mysqli_query($conn, $select_size);
              while($row_data = mysqli_fetch_assoc($result)){
                $size = $row_data['size'];
                $size_id = $row_data['_id'];
                echo "<option name='product_size' value='$size_id'> $size</option>";
              }
          ?>
        </select>
        </div>
        <div class="space">
        <input type="file" name="hero_1">
        </div>
        <div class="space">
        <input type="file" name="hero_2">
        </div>
        <div class="space">
        <button type="submit" name="insert_product">upload</button>
    </div>
</form>
</body>
</html>