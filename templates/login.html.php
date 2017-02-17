<!DOCTYPE html>
<html>
    <head>
        <title>Quote Your Note</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <link href="css/style.css" rel="stylesheet" type="text/css" >

	</head>
	
    <body>
		<div class="login-page">
		<div class="form">
		<form class="login-form" method="post" action="index.php">
			<input type="text" name="user_name" placeholder="name" required >
			<input type="password" name="user_password" placeholder="password" required >
			<input type="hidden" name="login" value="login" >
			<button type="submit" value="login">login</button>
			<p class="message">Not registered? <a href="#">Create an account</a></p>
		</form>

		<form class="register-form" method="post" action="index.php">
			<input type="text" name="user_name" required placeholder="name">
			<input type="password" name="user_password" required placeholder="password">
			<input type="hidden" name="register" value="register" >
			<button type="submit" value="create">create</button>
			<p class="message">Already registered? <a href="#">Sign In</a></p>
		</form>
		</div>
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src="js/index.js"></script>

	</body>
</html>