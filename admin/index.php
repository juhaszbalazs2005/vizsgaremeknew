<?php

    if(!isset($_SESSION["uid"])){
        header('Location: ../');
    }
    if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
        header('Location: ../');
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicTure | Adminfelület</title>
    <link rel="stylesheet" href="./user.css">
</head>
<body>
    <div id="userpanel">

        <center><h1>Admin felület</h1></center>
        <div id="fejlec">
        <ul id="links">
        <?php
            print('<li><a href="./?p='.$_GET["p"].'&a=userek">  Felhasználók  </a></li>');
            print("<br>");
            print('<li><a href="./?p='.$_GET["p"].'&a=userek">  Jelentések  </a></li>');
            print("<br>");
            print('<li><a href="./?p='.$_GET["p"].'&a=userek">  Ellenőrizésre váró képek  </a></li>');
        ?>
        </ul>
        </div>


    </div>

<style>

#fejlec{
    width: 100%;
    background-color: rgb(102, 67, 34);
    height: 100px;
    padding: 10px 20px 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-sizing: border-box;
    box-shadow: 15px 10px 10px rgba(0, 0, 0, 0.555);
}

#links{
    list-style: none;
    margin: 5px;
    display: flex;
    & li{
        & a{
            padding: 30px 15px;
            color: white;
            text-decoration: none;
        }
        & a:hover{
            background-color: rgb(129, 84, 42);
        }
    }
}

</style>    
</body>
</html>