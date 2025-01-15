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
    <link rel="stylesheet" href="editprofilepicture.css">
    <title>Picsture - Upload</title>
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


<!-- //Alsómenü -->
<div class="wrapper">

<a href="./?p=main">
<button class="Button_Home">
  <img src="Images/home.png" alt="Home" width="35px" height="35px">
</button>
</a>

<a href="./?p=upload">
<button class="Button_Photo">
  <img src="Images/photo.png" alt="Photo" width="35px" height="35px">
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
  <img src="Images/user.png" alt="User" width="35px" height="35px">
</button>
</a>

<a href="./?p=settings">
<button class="Button_Settings">
  <img src="Images/settings.png" alt="Settings" width="35px" height="35px">
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


<!-- Kártyák-->
    <div class="card-columns">

<!-- Kártya 2-->
    <div class="Kartya2">
      <div class="card text-center border-0 mb-4">
        <div class="card-cup bg-primary"></div>
        <div class="card-body proavatar">
          <div class="card-avatar avatar-border mt-n5">
            <rect width="100%" height="100%" fill="#495057"></rect>
          </div>
          <h5 class="card-title text-primary mb-1">Upload a photo</h5>
          <form action="rendszerek/uploadpic.php" method="post" enctype="multipart/form-data">

            <input type="text" name="pictitle" id="pictitle" style="display: none" value="pfp">
            <label for="kep" class="custom-file-upload"><b>Choose the picture</b></label>
            <input type="file" accept="image/*"  minlength="8" name="kep" id="kep" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img id="blah" alt="Your image will shown up here" width="200px"/>
            <br>

            <button type="submit" id="uploadbutton">Upload</button>

          </form>
        </div><br>
      </div>
    </div>

</div>
</div>
</div>


<!-- //Script -->
<script src="Settings_script.js"></script>
    
</body>
</html>