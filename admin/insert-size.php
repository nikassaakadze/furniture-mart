<?php

  include("../includes/connect.php");

  if (isset($_POST['insert_size'])) {

    $size = $_POST['size'];

    $select_query = "Select * from `size` where size = '$size'";

    $result_select = mysqli_query($conn, $select_query);

    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
      echo "<script>alert('color already exist') </script>";
    } else {

      $insert_query = "insert into `size` (size) values('$size')";

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
      <input type="text" name="size" class="form-control" placeholder="Category..." >
    </div>

    <div class="input-group mb-3">
      <input class="form-control bg-primary" type="submit" name="insert_size" value="Insert size">
    </div>

  </div>

</form>