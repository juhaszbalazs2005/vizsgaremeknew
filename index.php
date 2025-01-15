<?php
    
        include("rendszerek/errorpopup.php");

?>

<?php

        
        session_start();
        $ses = session_id();
        include("rendszerek/auth.php");
        $ip = getIPAddress();
        include("rendszerek/mysqlconn.php");

        $url = $_SERVER["REQUEST_URI"];

        if(isset($_SESSION["uid"]) && isset($url)){
            mysqli_query($con, "INSERT INTO note (nid, ndate, nip, nsession, nuid, nurl) VALUES (NULL, NOW(), '$ip', '$ses', '$_SESSION[uid]', '$url')");
        }else if(isset($_SESSION["uid"])){
            mysqli_query($con, "INSERT INTO note (nid, ndate, nip, nsession, nuid, nurl) VALUES (NULL, NOW(), '$ip', '$ses', '$_SESSION[uid]', 'Null')");
        }else if(isset($url)){
            mysqli_query($con, "INSERT INTO note (nid, ndate, nip, nsession, nuid, nurl) VALUES (NULL, NOW(), '$ip', '$ses', 'Null', '$url')");
        }
        
        if(!isset($_COOKIE["animatedbg"])){
            setcookie("animatedbg", true, time() + (86400 * 30), "/"); // 86400 = 1 nap
            print("<script>location.reload()</script>");
        }
        
        

?>

<?php

        if(isset($_GET["p"])) $p = $_GET["p"];
        else $p = "";

        if($p == "login") {include("Register.php");}
        else if($p == "register") {include("Register.php");echo '<script type="text/JavaScript">window.onload = function(){setTimeout(function(){document.querySelector("#signUp").click()}, 100)}</script>';}
        else if($p == "upload") {include("upload.php");}
        else if($p == "logout") {include("rendszerek/logout.php");}
        else if($p == "profile") {include("Profil.php");}
        else if($p == "settings") {include("Settings.php");}
        else if($p == "kezelopult") {include("./admin/index.php");}
        else if($p == "main") {include("Welcome_Main.php");}
        else if($p == "editprofilepicture") {include("editprofilepicture.php");}
        else if($p == "" && !isset($_GET["u"])) {include("Main_content.php");}
        else {include("404_form.php");}
?>
