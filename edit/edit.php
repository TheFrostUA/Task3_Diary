<?php 
	session_start();
	if (!isset($_SESSION['userid']))
	{
		header ("Location: ..\index.php");
		die();
	}
?>
	<html>

		<head>
			<title>Diary | home</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="../css/home.css">
			<script src="../scripts/jquery.js"></script>
			<script type="../js/noteoperating.js"></script>
		</head>
			<header>
				<nav class="navbar navbar-inverse navbar-fixed-top">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.html">Diary</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a onclick="return logout();">Log out</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			</header>
		<body>
		<style>
		.editpost
		{
			margin-top: 140px;
		}
		</style>
			<section class="editpost">
	<CENTER>
			Title: <input style="border-radius:10px" type="text"/> <br/>
	<p></p>

	<textarea style="border-radius:10px" name="text" cols="70" rows="13">Text</textarea>

	<p></p>
				<button class="btn btn-default" onclick="return modifynote();"><span class="glyphicon glyphicon-ok"></span>Apply</button>
				<a href="..\home\index.php"><button class="btn btn-default"><span class="glyphicon glyphicon-remove"></span>Cancel</button></a>
	</CENTER>
			<section/>
			<footer>
				<nav class="navbar navbar-default navbar-fixed-bottom navbar-sm">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">&copy; Diary Team</a>
				    </div>
				  </div><!-- /.container-fluid -->
				</nav>
			</footer>
	</body>
	</html>