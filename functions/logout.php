<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $url = "https://";   
    else  
      $url = "http://";   
      $url.= $_SERVER['HTTP_HOST'];     
      $redirect = $url .= '/ecommerce/index.php'; 
      
      session_start();
      session_unset();

    header("Location: $redirect");

  ?>  