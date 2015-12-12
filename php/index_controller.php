<?php
	require_once "dbconnect.php";
	session_start();
	
	if (isset($_POST['action']))
	{
		$action = $_POST['action'];
		if ($action == 'login')
		{
			$surname = mysql_escape_string($_POST['surname']);
			$name = mysql_escape_string($_POST['name']);
			$password = mysql_escape_string($_POST['password']);
			
			$query = "SELECT * FROM users "
					."WHERE surname = '" . $surname . "' AND name = '" . $name . "';";
			$result = mysql_query($query);
			
			$numrows = mysql_num_rows($result);
			
			if ($numrows == 0)
			{
				echo "There is no user with given name and surname, press register button to register";
				die();
			}
			
			$query = "SELECT * FROM users "
					."WHERE surname = '" . $surname . "' AND name = '" . $name . "' AND password = '" . $password . "';";
			$result = mysql_query($query);
			$numrows = mysql_num_rows($result);
			
			if ($numrows == 0)
			{
				echo "Wrong password";
				die();
			}
			$row = mysql_fetch_array($result, MYSQL_NUM);
			$_SESSION['userid'] = $row[3];
			echo "OK";
			die();
		}
		else if ($action == 'logout')
		{
			unset($_SESSION['userid']);
		}
	}
?>

