<?php

    $host = "localhost";  
    $user = "kldtkmkm_picstu";  
    $password = 'TompaNagyTermetuFa#123';  
    $db_name = "kldtkmkm_picstu";  
    
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 

?>