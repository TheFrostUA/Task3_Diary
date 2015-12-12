<?php

	mysql_connect("127.0.0.1", "root", "");
	mysql_select_db("DiaryDB");
	
	$userid = mysql_escape_string($_SESSION['userid']);
	$title = mysql_escape_string($_POST['title']);
	$text = mysql_escape_string($_POST['text']);
	$action = mysql_escape_string($_POST['action']);
	if($action = 'create')
	{
		$query = "INSERT INTO notes (userid, title, text, time) "
				."VALUES (" . $userid .", '" . $title ."', '" . $text ."', '" . new DateTime('NOW') . "');";
		
		mysql_query($query);
		if(mysql_affected_rows != 0)
		{
			echo "OK";
		}
		else
		{
			echo "Creation error.";
		}
		die();
	}
	else if($action = 'modify')
	{
		$noteid = mysql_escape_string($_POST['noteid']);
		$query = "UPDATE notes "
				."SET title = '" . $title . "', text = '" . $text ."', time = '" . new DateTime('NOW') . "' "
				."WHERE user = '" . $userId ."' AND id = '" . $noteId . "';";
		mysql_query($query);
		if(mysql_affected_rows != 0)
		{
			echo "OK";
		}
		else
		{
			echo "Error modifying note.";
		}
		die();
	}
	else if($action == 'delete')
	{
		$noteid = mysql_escape_string($_POST['noteid']);
		$query = "DELETE FROM notes WHERE noteid = " . $noteid . "";
		mysql_query($query);
		if (mysql_affected_rows != 0)
		{
			echo "OK";
		}
		else
		{
			echo "Error modifying note.";
		}
		die();
	}
	else if($action == 'getNoteTitle')
	{
		$noteid = mysql_escape_string($_POST['noteid']);
		$query = "SELECT * FROM notes WHERE noteid = " . $noteid . "";
		$result = mysql_query($query);
		$numrows = mysql_num_rows($result);
		if ($numrows == 0)
		{
			echo "error";
			die();
		}
		$row = mysql_fetch_array($result, MYSQL_NUM);
		echo $row["title"];
		die();
	}
	else if($action == 'getNoteText')
	{
		$noteid = mysql_escape_string($_POST['noteid']);
		$query = "SELECT * FROM notes WHERE noteid = " . $noteid . "";
		$result = mysql_query($query);
		$numrows = mysql_num_rows($result);
		if ($numrows == 0)
		{
			echo "error";
			die();
		}
		$row = mysql_fetch_array($result, MYSQL_NUM);
		echo $row["text"];
		die();
	}
?>