<?php
session_start();
session_unset();
  echo "<script>window.open('http://localhost/ecommerce/index.php', '_self')</script>";
?>