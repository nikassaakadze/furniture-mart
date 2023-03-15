<?php

  include("../includes/connect.php");

  if (isset($_POST['insert_color'])) {

    $color_name = $_POST['color_name'];

    $select_query = "Select * from `colors` where color = '$color_name'";

    $result_select = mysqli_query($conn, $select_query);

    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
      echo "<script>alert('color already exist') </script>";
    } else {

      $insert_query = "insert into `colors` (color) values('$color_name')";

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
      <input type="text" name="color_name" class="form-control" placeholder="Category..." >
    </div>

    <div class="input-group mb-3">
      <input class="form-control bg-primary" type="submit" name="insert_color" value="Insert color">
    </div>

  </div>

</form>