function validate()
{
	var name = document.getElementById("name");
	if(name.value == "")
	{
		window.alert("Input name");
		name.focus();
		return false;
	}
	var surname = document.getElementById("surname");
	if(surname.value == "")
	{
		window.alert("Input surname");
		surname.focus();
		return false;
	}
	var email = document.getElementById("email");
	p=/^[a-z0-9_\.\-]+@([a-z0-9_\-]+\.)+[a-z]{2,6}$/i;
	if(!p.test(email.value))
	{
		window.alert("Invalid email");
		email.focus();
		return false;
	}
	var password = document.getElementById("password");
	p=/^[a-z0-9_\.\-]{6,16}$/i;
	if(!p.test(password.value))
	{
		window.alert("Invalid password");
		password.focus();
		return false;
	}
	return true;
}
function signup()
{
	if(validate())
	{
		
		var name = document.getElementById("name").value;
		var surname = document.getElementById("surname").value;
		var email = document.getElementById("email").value;
		var password = document.getElementById("password").value;

		var dataString = 'name=' + name + '&surname=' + surname + '&email=' + email + '&password=' + password + '&action=register';
		
		$.ajax(
		{
			type:"post",
			url: "php/SignUp.php",
			data: dataString,
			cache:false,
			success:function(response)
			{
				if(response=="OK")
				{
					alert("Registration successful");
					window.location.replace("index.php");
				}
				else
				{
					alert(response);
				}
			}
		});
		return false;
	}
	else
	{
		//??maybe something to do
	}
	return false;
}