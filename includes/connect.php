<?php

  $conn = mysqli_connect('localhost', 'root', '', 'furniture_market');

  if(!$conn){
    die(mysqli_connect($conn));
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
  
?>