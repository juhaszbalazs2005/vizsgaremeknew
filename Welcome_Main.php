<?php

    if(!isset($_SESSION["uid"])){
        header('Location: ./');
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

      if($_COOKIE["darkmode"] == "false"){
        print('<link rel="stylesheet" href="Welcome_Style.css">');
      }else{
        print('<link rel="stylesheet" href="Welcome_Style_Dark.css">');
      }

    ?>
    <title>Picsture - Welcome!</title>
</head>
<body>
    
  
<!-- //Background -->
<?php

if($_COOKIE["animatedbg"] == "false"){
  print('<div>
          <div class="wave" style="animation: none"></div>
          <div class="wave" style="animation: none"></div>
          <div class="wave" style="animation: none"></div>
        </div>');
}else{
  print('<div>
          <div class="wave"></div>
          <div class="wave"></div>
          <div class="wave"></div>
        </div>');
}

?>


<!-- //Képkeret -->
 <div id="frame">
  <?php

  $host = "localhost";  
  $user = "kldtkmkm_picstu";;  
  $password = 'TompaNagyTermetuFa#123';  
  $db_name = "kldtkmkm_picstu";  
  
  $con = mysqli_connect($host, $user, $password, $db_name);  
  if(mysqli_connect_errno()) {  
      die("Failed to connect with MySQL: ". mysqli_connect_error());  
  } 

  $sql = "
  SELECT *
  FROM pictures t1
  WHERE NOT EXISTS (SELECT 1 FROM dislikes t2 WHERE t2.ddid = $_SESSION[uid] and t2.dpid = t1.pid)
    AND NOT EXISTS (SELECT 1 FROM likes t3 WHERE t3.llid = $_SESSION[uid] and t3.lpid = t1.pid)
    AND t1.puid != $_SESSION[uid] AND t1.pnev != 'pfp'
  ORDER BY RAND()
  LIMIT 1;
  ";  
  $result = mysqli_query($con, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);

  if ($count != 0){
    echo "<img src='uploads/$row[plocation]'>";
  }else{
    echo "<h1>There is no picture to load</h1>";
  }
  
  $pid = $row["pid"];
  $puid = $row["puid"];

  ?>
  </div>


<!-- //Like/Dislike -->
<div class="container">
  <div class="Like">
    <form action="rendszerek/likeordislike.php" method="post">

      <input type="text" hidden value=<?php echo "$row[pid]"?> name="pid">
      <input type="text" hidden value="Like" name="ivalue">
      <button type="submit"><div class="btn"><a>🤍</a></div></button>

    </form>
  </div>

  <div class="DisLike">
    <form action="rendszerek/likeordislike.php" method="post">

    <input type="text" hidden value=<?php echo "$row[pid]"?> name="pid">
    <input type="text" hidden value="Dislike" name="ivalue">
    <button type="submit"><div class="btn"><a>🤍</a></div></button>

    </form>
  </div>
  <div id="user">
    <a href=<?php echo "?p=profile&u=$row[puid]"?>>
        
    <?php
        $picloc = "";
        if(isset($row['puid'])){
            $host = "localhost";  
            $user = "kldtkmkm_picstu";;  
            $password = 'TompaNagyTermetuFa#123';  
            $db_name = "kldtkmkm_picstu";  
            
            $con = mysqli_connect($host, $user, $password, $db_name);  
            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            } 
        
            $sql = "select * from pictures where puid = '$row[puid]' and pnev = 'pfp' ORDER BY pdate DESC";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);
        
            for($i = 0; $i < $count; $i = $i + 1){

                $picloc = $row['plocation'];
                echo "<img src='uploads/$row[plocation]' alt='' id='pfp'>";
                break;
            }
        }
        if($picloc == ""){
            echo "<img src='Images/avatar.png' alt='' id='pfp'>";
        }
        
    
    ?>
        
    </a>
    <form action="rendszerek/followuser.php" method="post">

      <input type="text" hidden value=<?php echo "$pid"?> name="pid">
      <input type="text" hidden value=<?php echo "$puid"?> name="puid">
      <button type="submit"><div class="btn"><a><?php
      
      $host = "localhost";  
      $user = "kldtkmkm_picstu";;  
      $password = 'TompaNagyTermetuFa#123';  
      $db_name = "kldtkmkm_picstu";  
      
      $con = mysqli_connect($host, $user, $password, $db_name);  
      if(mysqli_connect_errno()) {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
      } 
    
      $sql = "
      SELECT * FROM followers WHERE fuid = $row[puid] AND ffid = $_SESSION[uid]
      ";  
      $result = mysqli_query($con, $sql);  
      $count = mysqli_num_rows($result);
            
      if ($count == 1){
        echo "Unfollow";
      }else{
        echo "Follow";
      }

      ?></a></div></button>

    </form>
    <p><?php 

    if(isset($pid)){
      $sql = "
      SELECT *
      FROM likes
      WHERE lpid = $pid;
      ";  
      $result = mysqli_query($con, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);
      
      echo "$count";
    }
    else{
      echo "0";
    }
    
    ?> LIKES</p>
  </div>


</div>	



<!-- //Alsómenü -->
 <div class="wrapper">

  <a href="./?p=main">
  <button class="Button_Home">
    <?php

      if($_COOKIE["darkmode"] == "false"){
        print('<img src="Images/home.png" alt="Home" width="35px" height="35px">');
      }else{
        print('<img src="Images_Dark/home.png" alt="Home" width="35px" height="35px">');
      }

    ?>
  </button>
  </a>

  <a href="./?p=upload">
  <button class="Button_Photo">
  <?php

if($_COOKIE["darkmode"] == "false"){
  print('<img src="Images/photo.png" alt="Home" width="35px" height="35px">');
}else{
  print('<img src="Images_Dark/photo.png" alt="Home" width="35px" height="35px">');
}

?>
  </button>
  </a>
  <button class="item add">
    <div class="circle">
      <div class="close">
      <div class="line line1"></div>
      <div class="line line2"></div>
    </div>
    </div>
    <input type="search" class="search" />
</button>
  <a href="./?p=profile">
  <button class="Button_User">
  <?php

if($_COOKIE["darkmode"] == "false"){
  print('<img src="Images/user.png" alt="Home" width="35px" height="35px">');
}else{
  print('<img src="Images_Dark/user.png" alt="Home" width="35px" height="35px">');
}

?>
  </button>
  </a>

  <a href="./?p=settings">
  <button class="Button_Settings">
  <?php

if($_COOKIE["darkmode"] == "false"){
  print('<img src="Images/settings.png" alt="Home" width="35px" height="35px">');
}else{
  print('<img src="Images_Dark/settings.png" alt="Home" width="35px" height="35px">');
}

?>
  </button>
  </a>
    <div class="nav-items items1">
      <i class="fas fa-home">Vlm</i>
    </div>
    <div class="nav-items items2">
      <i class="fas fa-camera">Vlm</i>
    </div>
    <div class="nav-items items3">
      <i class="fas fa-folder">Vlm</i>
    </div>
    <div class="nav-items items4">
      <i class="fas fa-heart">Vlm</i>
    </div>
    <div class="box">
      <div class="box-line box-line1">Vlm</div>
      <div class="box-line box-line2">Vlm</div>
      <div class="box-line box-line3">Vlm</div>
      <div class="box-line box-line4">Vlm</div>
    </div>
  </div>
  <div class="effect"></div>




























<!-- //Script -->
  <script src="Welcome_script.js"></script>
</body>
</html>