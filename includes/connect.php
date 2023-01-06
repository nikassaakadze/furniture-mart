<?php

  $conn = mysqli_connect('localhost', 'root', '', 'furniture_market');

  if(!$conn){
    die(mysqli_connect($conn));
  }
  
?>