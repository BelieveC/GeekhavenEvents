<?php
	if($_POST){
		include('logincheck.php');
	}
?>
<!doctype html>
<html>
<head>
<title>Member Login | GeekHaven</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
<!-- /font files -->
<!-- css files -->
<link href="css/login.css" rel='stylesheet' type='text/css' media="all" />
<link rel="icon" 
      type="image/png" 
      href="images/geekhaven.png">
<!-- /css files -->
</head>
<body>
<h1>GeekHaven Member Login</h1>
<p></p>
<div class="content-w3ls">
	<form action="login2.php" method="post" class="form-agileits">
		<div class="form-w3ls">
			<h2>LDAP Login</h2>
			<button type="submit" class="sign-in" value="Sign In"><img src="images/geekhaven.png" alt="w3layouts"></button>
			<div class="clear"></div>
		</div>
		<input type="text" name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
		<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
		<input type="submit" class="sign-in" value="Submit">
	</form>
</div>
<p class="copyright">© 2016 WebD | <a href="http://geekhaven.iiita.ac.in" target="_blank">GeekHaven</a></p>
</body>
</html>