<?php
	session_start();
	if(isset($_SESSION['userid']))
	{
		header('Location: home/index.html');
		die();
	}
?>

<html>

	<head>
		<script src="scripts/index_scripts.js"></script>
		<script src="scripts/jquery.js"></script>
	</head>
	
	<body>
		<nav>
			<label for "surnameTb">Surname:</label>
			<input type="text" id="surnameTb" />
			<label for "nameTb">Name:</label>
			<input type="text" id="nameTb" />
			<label for "passwordTb">Password:</label>
			<input type="password" id="passwordTb" />
			<button onclick="return login();">Login</button>
			<a href="SignUp.html"><button>Register</button></a>
			<div id="errorDiv">
				
			</div>
		<nav>
	<body>
</html>