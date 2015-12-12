<?php
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header("Location: ..\index.php");
	}
?>
<html>

	<head>
		<title>Diary | home</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/home.css">
	</head>

	<body>
		<style>
			section
			{
			margin-top: 90px;
			margin-left: 20px;
			}
			.main
			{
				margin-top: 13%;
				margin-right: 10%;
				margin-left: 10%;
			}
			.lead
			{
				text-align: center;
			}
			.table-my
			{
				padding: 5px;
				margin-top: 15px;
			}
			.buttons
			{
				margin-top: 20px;
				margin-left: 30px;
			}
			.post
			{
				vertical-align: middle;
			}
			.label-info
			{
				
				margin-left: 90%;
			}
		</style>
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
			        <li><button class="btn btn-default" onclick="return logout();">Log out</button></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</header>


		
		<section>
			<div class="main">
				<div class="buttons">
					<a href="edit.html">
					<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
					</a>
					<button class="btn btn-default" onclick="function()"><span class="glyphicon glyphicon-remove"></span> Delete</button>
				</div>
				<?php
					
							
					$conn = new mysqli("localhost", "root", "", "DiaryDB");
					$sql = "SELECT * FROM notes";
					$result = $conn->query($sql);

					if ($result->num_rows > 0)
					{
					    // output data of each row
					    //while($row = $result->fetch_assoc()) {
						while($row = $result->fetch_assoc())
						{
							if($row["noteid"] == $_GET["noteid"])
							{
								echo "<span class=\"label label-info\">";
								echo $row["time"] . "</span>";
								echo "<table class=\"table-my\">";
								echo "<tr>
									<td class=\"post\">
										<div class=\"well well-sm\">
											<p class=\"lead\">";
								echo $row["title"] . "</p></div></td></tr>";
								echo "<tr><td class = \"post\">";
								echo "<p class=\"text-center\">";
								echo $row["text"] . "</p>";
								echo "</td></tr>";
							}
						}
					}
					else
					{
					    echo "0 results";
					}
				?>
				
				
				</table>
			</div>
			
		</section>


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

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="../scripts/index_scripts.js"></script> 
		<script src="../scripts/jquery.js"></script>
	</body>
</html>