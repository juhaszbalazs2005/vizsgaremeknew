<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main_style.css">
    <title>Picsture - Main page</title>
</head>
<body>
    
<!-- //Navbar -->
    <div class="navbarfelso">
    <h1 data-item='Picsture'>Picsture</h1>
    <section>
        <div class="felso_szoveg">Show what you got!</div>
    <nav>
        <ul class="menuItems">
        <li><a href='./' data-item='Home'>Home</a></li>
        <li><a href='./?p=login' data-item='Sign in'>Sign in</a></li>
        <li><a href='./?p=register' data-item='Sign up'>Sign up</a></li>
        <li><a href='./?p=about' data-item='Abouts us'>About us</a></li>
        <li><a href='./?p=contact' data-item='Contact'>Contact</a></li>
        </ul>
    </nav>
    </section>
    </div>

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
     <div id="palya">

        

        <figure class="circle" id="golyod"></figure>
        <script>
          document.querySelector(".circle").style.left = "500px";
          document.querySelector(".circle").style.bottom = "55px";
          document.querySelector(".circle").style.background = `radial-gradient(circle at 0px 0px, #e4cce6, #d2bcd4)`;
        </script>
        <div class="like">
            <input type="checkbox" id="liked"><label for="liked"><img src="heart.png" alt="" class="liked" width="60px"></label>
        </div>
        <div class="like2">
            <input type="checkbox" id="liked2"><label for="liked2"><img src="heart.png" alt="" class="liked2" width="60px"></label>
        </div>

    </div>

<!-- //Galléria -->
<div class="gallery">
  <img src="https://picsum.photos/id/1040/300/300" alt="a house on a mountain">
  <img src="https://picsum.photos/id/106/300/300" alt="sime pink flowers">
  <img src="https://picsum.photos/id/136/300/300" alt="big rocks with some trees">
  <img src="https://picsum.photos/id/110/300/300" alt="a cool landscape">
</div>

<!-- //Szövegek -->
      <div class="Alszoveg_felso1">
        <h2>Information</h2>
      </div>
      <div class="Alszoveg_also1">
        <p>This site is designed to share your images with the world.</p>
        <p>Here your images can reach thousands of users!</p>
        <p>Manage a community, easily.</p>
        <p>Art, food, stories and news in one place.</p>
        <p>Discover and develop your artistic skills.</p>
        <p>Just one click and millions of people around the world can discover your talent!</p>
      </div>
      <div class="Alszoveg_felso2">
        <h2>Registration</h2>
      </div>
      <div class="Alszoveg_also2">
        <p>You can be on the site with a simple process,</p>
        <p>just click the registration button,</p> 
        <p>fill in some information,</p>
        <p>and manage your profile however you want!</p>
      </div>

<!-- //Gomb -->
      <div class="gomb_also">
        <a href="./?p=register" class="button type--A">
          <div class="button__line"></div>
          <div class="button__line"></div>
          <span class="button__text">REGISTRATION</span>
          <div class="button__drow1"></div>
          <div class="button__drow2"></div>
      </div>
<!-- //Footer -->

      <footer>
        <div class="footer-copyright text-center">&copy; -</i> -
          <a href="https://" class="white-text" target="_blank">© - - All rights reserved: MHB. JoySharer kft.</a>
        </div>
      </footer>
</body>
</html>
<script src="gomb.js"></script>