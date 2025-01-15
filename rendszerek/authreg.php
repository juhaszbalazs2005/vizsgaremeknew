<?php      

    $requestMethod = $_SERVER["REQUEST_METHOD"]; 
    if ($requestMethod !== 'POST') {
        http_response_code(400);
    }else{

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

        include("mysqlconn.php");
        $username = $_POST['nameregister'];  
        $password = $_POST['passwordregister'];  
        $passwordagain = $_POST['passwordregister'];  
        $email = $_POST['emailregister'];

            if($password != $passwordagain){
                setcookie("error", "The passwords do not match!", time() + (60 * 30), "/");
                header('Location: ../?p=register'); 
            }else{
                $username = stripcslashes($username);  
                $password = stripcslashes($password);  
                $username = mysqli_real_escape_string($con, $username);  
                $password = mysqli_real_escape_string($con, $password);

                if(strlen($password) < 8){
                    setcookie("error", "The length of your password cannot be shorter than 8 characters!", time() + (60 * 30), "/");
                    header('Location: ../?p=register'); 
                }
                if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
                    setcookie("error", "The email address is not correct!", time() + (60 * 30), "/");
                    header('Location: ../?p=register'); 
                }
            
                $sql = "select * from user where unick = '$username'";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
                
                if($count == 1){  
                    setcookie("error", "1 account with the given username is already registered!", time() + (60 * 30), "/");
                    header('Location: ../?p=register'); 
                }  
                else{  
                    $username = stripcslashes($username);  
                    $password = stripcslashes($password);  
                    $username = mysqli_real_escape_string($con, $username);  
                    $password = mysqli_real_escape_string($con, $password);  
                
                    $currentdate = date("Y-m-d");
                    $ip = getIPAddress();

                    session_start();
                    $session_id = session_id();
                    $hashedpass = hash('sha256', $password);

                    $sql = "insert into user (uid, uemail, unick, upw, uszuletesnap, udate, uip, usession, ustatus, ukomment) VALUES ('NULL', '$email', '$username', '$hashedpass', 'NULL', '$currentdate', '$ip', '$session_id', '0', '')";  
                    $result = mysqli_query($con, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);

                    setcookie("error", "!Successful registration!", time() + (60 * 30), "/");
                    header('Location: ../'); 
                }
            }
        }
        mysqli_close($con);
        
?>  