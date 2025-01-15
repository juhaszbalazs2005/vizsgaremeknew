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
        session_start();
        $puid = $_POST['puid'];  
        $pid = $_POST['pid'];  

        $sql = "select * from followers WHERE fuid = $puid AND ffid = $_SESSION[uid]";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count > 0){
            $sql = "DELETE from followers WHERE fuid = $puid AND ffid = $_SESSION[uid]";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);
            setcookie("error", "!User unfollowed!", time() + (60 * 30), "/");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        if(!isset($pid)){
            setcookie("error", "You can't interact with a not loaded picture!", time() + (60 * 30), "/");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        $session_id = session_id();
        $sql = "insert into followers (fid, fuid, ffid) VALUES ('NULL', $puid, $_SESSION[uid])";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        setcookie("error", "!User followed!", time() + (60 * 30), "/");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        
    }
    mysqli_close($con);
        
?>  