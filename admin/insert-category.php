<?php

  include("../includes/connect.php");

  if (isset($_POST['insert_category'])) {

    $category_name = $_POST['category_name'];

    $select_query = "Select * from `categories` where category_name = '$category_name'";

    $result_select = mysqli_query($conn, $select_query);

    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
      echo "<script>alert('category already exist') </script>";
    } else {

      $insert_query = "insert into `categories` (category_name) values('$category_name')";

      $result = mysqli_query($conn, $insert_query);

      if ($result) {
        echo "<script>alert('inserted') </script>";
      }

    }

  }

?>

<form action="" method="post" class="mb-2">

  <div class="input-group mt-3">

    <div class="input-group mb-3">
      <input type="text" name="category_name" class="form-control" placeholder="Category..." >
    </div>

    <div class="input-group mb-3">
      <input class="form-control bg-primary" type="submit" name="insert_category" value="Insert Category">
    </div>

  </div>

</form>