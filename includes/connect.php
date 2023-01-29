<?php

  $conn = mysqli_connect('sql105.epizy.com', 'epiz_33479397', 'KaPMfMKShp2S', 'epiz_33479397_furniture_mart');

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