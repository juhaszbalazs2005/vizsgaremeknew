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
        $ivalue = $_POST['ivalue'];  
        $pid = $_POST['pid'];  

        if(!isset($pid)){
            setcookie("error", "You can't interact with a not loaded picture!", time() + (60 * 30), "/");
            header('Location: ../?p=main');
            die();
        }

        session_start();
        $session_id = session_id();
        $hashedpass = hash('sha256', $password);
        if($ivalue == "Like"){
            $sql = "insert into likes (lid, lpid, llid) VALUES ('NULL', $pid, $_SESSION[uid])";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);

            header('Location: ../?p=main'); 
        }else{
            $sql = "insert into dislikes (did, dpid, ddid) VALUES ('NULL', $pid, $_SESSION[uid])";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);

            header('Location: ../?p=main'); 
        }
        
    }
    mysqli_close($con);
        
?>  