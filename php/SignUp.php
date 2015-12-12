<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "diarydb";
if($conn = @mysql_connect($servername, $username, $password))
{
	$db = mysql_select_db($dbname);
	if (!isset($_POST['name'])) 
	{
		echo "Форма не відправлена";
	}
	else
	{
		$name = (isset($_POST['name'])) ? $_POST['name'] : '';
		$surname = (isset($_POST['surname'])) ? $_POST['surname'] : '';
		$email = (isset($_POST['email'])) ? $_POST['email'] : '';
		$password = (isset($_POST['password'])) ? $_POST['password'] : '';
		
		if(get_magic_quotes_gpc())
		{
			$name = stripcslashes($name);
			$surname = stripcslashes($surname);
			$email = stripcslashes($email);
			$password = stripcslashes($password);
		}
		
		$query = "SELECT * FROM users WHERE name = '" . $name. "' AND surname = '" . $surname . "'";
		$queryUserName = mysql_query($query, $conn);
		if(mysql_num_rows($queryUserName)!= 0)
		{
			echo "Name and Surname is already taken!";
			die();
		}
		
		$queryEmail = mysql_query("SELECT * FROM users WHERE email = '" . $email . "'", $conn);
		if(mysql_num_rows($queryEmail)!= 0)
		{
			echo "Email is already taken!";
			die();
		}
		
		$sql="INSERT INTO users (name, surname, email, password) VALUES('" . $name . "', '" . $surname . "', '" . $email . "', '" . $password . "')";
		if (!mysql_query($sql,$conn))
		{
			die('Error: ' . mysql_error());
		}
		else
		{			
			echo "OK";
			die();
		}
	}
}
?>