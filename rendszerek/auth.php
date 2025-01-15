<?php    

    function getIPAddress() {  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }   
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  

    $requestMethod = $_SERVER["REQUEST_METHOD"]; 
    if ($requestMethod !== 'POST') {
        http_response_code(400);
    }else{
        include("mysqlconn.php");
        $email = $_POST['emaillogin'];  
        $password = $_POST['passwordlogin'];  

            $email = stripcslashes($email);  
            $password = stripcslashes($password);  
            $email = mysqli_real_escape_string($con, $email);  
            $password = mysqli_real_escape_string($con, $password);  

            $hashedpass = hash('sha256', $password);

            $sql = "select * from user where uemail = '$email' and upw = '$hashedpass'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);
            
            if($count == 1){
                session_start();
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["uemail"] = $row["uemail"];
                $_SESSION["uname"] = $row["unick"];
                setcookie("animatedbg", true, time() + (86400 * 30), "/"); // 86400 = 1 nap
                if($row["ustatus"] == 1){
                    $_SESSION["admin"] = true;
                }else{
                    $_SESSION["admin"] = false;
                }

                $sql = "INSERT INTO `login`(`lid`, `luid`, `lip`, `lsession`) VALUES (null,".$_SESSION["uid"].",'".getIPAddress()."','".session_id()."')";  
                $result = mysqli_query($con, $sql);
                header('Location: ../?p=main'); 
            }  
            else{  
                setcookie("error", "Incorrect username or password!", time() + (60 * 30), "/");
                header('Location: ../?p=login'); 
            }
        mysqli_close($con);
    }

    
?>  