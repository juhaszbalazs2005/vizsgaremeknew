<?php      

    session_start();

    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxy';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }

    $requestMethod = $_SERVER["REQUEST_METHOD"]; 
    if ($requestMethod !== 'POST') {
        http_response_code(400);
    }else{ 

        include("mysqlconn.php");
        $pictitle = $_POST['pictitle'];
        if(!isset($pictitle) || $pictitle == ""){
            setcookie("error", "You didn't provide a title for the image!", time() + (60 * 30), "/");
            header('Location: ../?p=upload'); 
            die();
        }
        if($pictitle == "pfp" && $_SERVER['HTTP_REFERER'] != "http://picsture.hu/?p=editprofilepicture"){
            setcookie("error", "This address is blocked in the system!", time() + (60 * 30), "/");
            header('Location: ../?p=upload'); 
            die();
        }
    
        $piclocation = generateRandomString(6);
        while(file_exists("../uploads/".$piclocation.".png" || "../uploads/".$piclocation.".jpg" || "../uploads/".$piclocation.".jpeg")){
            $piclocation = generateRandomString(6);
        }

        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["kep"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($_FILES["kep"]["tmp_name"] != ""){
            $check = getimagesize($_FILES["kep"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        else{
            setcookie("error", "You didn't provide the picture!", time() + (60 * 30), "/");
            header('Location: ../?p=upload');
            die();
        }

        

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["kep"]["tmp_name"], "../uploads/".$piclocation.".".$imageFileType)) {
                $session_id = session_id();

                $sql = "INSERT INTO `pictures`(`pid`, `puid`, `pnev`, `plocation`, `pusession`) VALUES (null,".$_SESSION['uid'].",'".$pictitle."','".$piclocation.".".$imageFileType."','".$session_id."')";  
                $result = mysqli_query($con, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);
        
                setcookie("error", "!Successful image upload!", time() + (60 * 30), "/");
                header('Location: ../?p=profile');
                die();
            } else {
                setcookie("error", "An error occurred while uploading the image!", time() + (60 * 30), "/");
                header('Location: ../?p=upload'); 
            }
        }
         
    }
        mysqli_close($con);
        
?>  