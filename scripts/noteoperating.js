function createnote()
{
	var title = document.getElementById('title');
	var text = document.getElementById('text');
	var dataString = 'title=' + title + '&text=' + text + '&action=create';
	$.ajax(
		{
			type: "post",
			url: "../php/noteOperator.php",
			data: dataString,
			cache: false,
			success: function(response)
			{
				if (response=="OK")
				{
				window.location.replace('../home/index.php');
				}
				else
				{
					alert(response);
				}
			}
		}
	);
	return false;
}

function modifynote()
{
	var noteid = "<?php echo $_GET['noteid']; ?>";
	if (noteid == -1)
	{
		return createnote();
	}
	var title = document.getElementById('title');
	var text = document.getElementById('text');
	var dataString = 'note='+ noteid + '&title=' + title + '&text=' + text + '&action=modify';
	$.ajax(
		{
			type: "post",
			url: "../php/noteOperator.php",
			data: dataString,
			cache: false,
			success: function(response)
			{
				if (response=="OK")
				{
					window.location.replace('../home/index.php');
				}	
				else
				{
					alert(response);
				}
			}
		}
	);
	return false;
}

function deletenote()
{
	var noteid = "<?php echo $_GET['noteid']; ?>";
	var dataString = 'noteid='+noteid + "&action=delte";
	$.ajax(
		{
			type: "post",
			url: "../php/noteOperator.php",
			data: dataString,
			cache: false,
			success: function(response)
			{
				if (response=="OK")
				{
					window.location.replace('../home/index.php');
				}
				else
				{
					alert(response);
				}
			}
		}
	);
	
	return false;
}