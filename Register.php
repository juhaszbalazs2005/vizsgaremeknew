<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register_style.css">
    <title>Picsture - Login/Register</title>
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


<!-- //Navbar -->
<div class="navbarfelso">
    <h1 data-item='Picsture'>Picsture</h1>
    <section>
	<div class="felso_szoveg">Show what you got!</div>
    <nav>
        <ul class="menuItems">
        <li><a href='./' data-item='Home'>Home</a></li>
        <li><a href='./?p=login' data-item='Sign in'><b>Sign in</b></a></li>
        <li><a href='./?p=register' data-item='Sign up'><b>Sign up</b></a></li>
        <li><a href='./?p=about' data-item='About us'>About us</a></li>
        <li><a href='./?p=contact' data-item='Contact'>Contact</a></li>
        </ul>
    </nav>
    </section>
    </div>


<!-- //Regisztráció/login -->	
<div class="Panel">
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="./rendszerek/authreg.php" method="post">
				<h2>Create Account</h2>
				<input type="text" placeholder="Name" name="nameregister"/>
				<input type="email" placeholder="Email" name="emailregister"/>
				<input type="password" placeholder="Password" name="passwordregister"/>
				<button type="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="./rendszerek/auth.php" method="post">
				<h2>Sign in</h2>
				<input type="email" placeholder="Email" name="emaillogin" />
				<input type="password" placeholder="Password" name="passwordlogin"/>
				<a href="#">Forgot your password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h2>Welcome Back!</h2>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h2>Hello, Friend!</h2>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- //Footer -->
<footer>
	<div class="footer-copyright text-center">&copy; -</i> -
	  <a href="https://" class="white-text" target="_blank">All rights reserved: MHB</a>. <a href="https://" target="_blank">JoySharer kft. </a>
	</div>
</footer>

<!-- //Script -->
<script src="Register_script.js"></script>
</body>
</html>