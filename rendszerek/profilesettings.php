<?php      
    session_start();
    $requestMethod = $_SERVER["REQUEST_METHOD"]; 
    if ($requestMethod !== 'POST') {
        http_response_code(400);
    }else{

        include("mysqlconn.php");
        $username = $_POST['newname'];  
        $password = $_POST['password'];  
        $password2 = $_POST['newpassword'];   

        $uid = $_SESSION["uid"];  
    
        $sql = "select * from user where uid = '$uid'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){
            if($password2 != ""){
                if(strlen($password2) < 8){
                    setcookie("error", "The length of your password cannot be shorter than 8 characters!", time() + (60 * 30), "/");
                    header('Location: ../?p=settings'); 
                }
                $session_id = session_id();
                $hashedpass = hash('sha256', $password);
                $hashedpass2 = hash('sha256', $password2);

                $sql = "select * from user where uid = ".$uid."";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);

                if($row["upw"] == $hashedpass){
                    $sql = "UPDATE user SET upw='".$hashedpass2."' WHERE uid = ".$_SESSION['uid']."";  
                    $result = mysqli_query($con, $sql);  

                    
                    header('Location: ../?p=logout');
                    die();
                }else{
                    setcookie("error", "Incorrect password!", time() + (60 * 30), "/");
                    header('Location: ../?p=settings'); 
                }
            }
            if($username != ""){
                if(strlen($username) < 8){
                    setcookie("error", "Your name cannot be shorter than 8 characters!", time() + (60 * 30), "/");
                    header('Location: ../?p=settings'); 
                }
                $session_id = session_id();

                $sql = "select * from user where unick = ".$username."";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);
                if($count != 0){
                    setcookie("error", "This username is already taken!", time() + (60 * 30), "/");
                    header('Location: ../?p=settings');
                }

                $sql = "select * from user where uid = ".$uid."";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);

                if($row["unick"] != $username){
                    $sql = "UPDATE user SET unick='".$username."' WHERE uid = ".$_SESSION['uid']."";  
                    $result = mysqli_query($con, $sql);  

                    
                    header('Location: ../?p=logout');
                    die();
                }else{
                    setcookie("error", "Your name cannot be the same as your previous name!", time() + (60 * 30), "/");
                    header('Location: ../?p=settings'); 
                }
            }
        }
    }
    mysqli_close($con);
    header('Location: ../?p=settings'); 
        
?>  