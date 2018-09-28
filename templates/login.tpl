<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="login">
      <form name='form-login' method="post" action="verificarLogin">
        <span class="fontawesome-user"></span>
        <input type="text" id="user" name="user" placeholder="Username">
        <span class="fontawesome-lock"></span>
        <input type="password" id="pass" name="pass" placeholder="Password">
        <div class="">
        	{$Message}
      	</div>
        <input type="submit" value="Login">
	  </form>
	</div>

</body>
</html>
