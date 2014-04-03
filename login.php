<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" /><style type="text/css">
#container #content #loginform {
	/* [disabled]background-color: #FF0; */
	
	height: 500px;
	width: 400px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/Sign-In-Form-Background.gif);
}
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">
function valadateLogin()
{
	var valid = true;
	var username = document.getElementById("username");
	var password = document.getElementById("password");
	
	//username.setCustomValidity("");
	//password.setCustomValidity("");
	
	if( username.value == "Username" )
	{
		valid = false;
		$('#username').mouseenter();
	}
	
	if( password.value == "Password" )
	{
		valid = false;
		$('#password').mouseenter();
	}
	
	if( username.value.length < 6 )
	{
		valid = false;
		username.style.background = "rgba(255, 0, 0, 0.4)";
		$('#username').attr('title', "Username must be longer than 6 charactors");
		$('#username').mouseenter();
	}
	else 
	{
		username.style.background = "rgba(255, 255, 255, 0.8)";
		$('#username').attr('title', "Please enter your username");
	}
	
	if( password.value.length < 6 )
	{
		valid = false;
		password.style.background = "rgba(255, 0, 0, 0.4)";
		$('#password').attr('title', "Password must be longer than 6 charactors");
		$('#password').mouseenter();
	}
	else 
	{
		password.style.background = "rgba(255, 255, 255, 0.8)";
		$('#password').attr('title', "Please enter your password");
	}
	
	return valid;
}
</script>

<script>

$(function() {
	$('#loginform [title]').tooltip({ position: { my: "right+120 center", at: "right+120 center" }, opacity: 0.7 });
	
});

</script>

</head>

<body >

<div id="container">
	<div id="header">
   	  <div id="logo"> <a href="index.php"><img src="images/logo.png" width="498" height="173" /></a> 
        
      </div>
      <div id="account">
        <?php
			if( $_SESSION["fullname"] ) 
			{
				echo "Welcome " . $_SESSION["fullname"];
				echo " - ";
				echo "<a href='updatedetails.php'>Update Your Details</a>";
				echo " - ";
				if( $_SESSION['acctype'] == 1 )
				{
					echo "<a href='teacheroverview.php'>View Your Students Progress</a>";
					echo " - ";
				}
				echo "<a href='php/logout.php'>Logout</a>";
			}
			else echo "<a href='login.php'>Sign In</a> - <a href='signup.php'>Create An Account</a>";
		?>
        </div>
  </div>
    
    <div id="content">
   	  <div id="loginform" class="form">
        	<div id="title">
            	<img src="images/login-text.png" width="300" height="97" />
       		 </div>
        	<form action="php/signin.php" onsubmit="return valadateLogin()" method="post" name="signin">
            	<input id="username" title="Please enter your username" name="username" type="text" class="text" value="Username" size="60" maxlength="60" onfocus="if(this.value == 'Username') this.value = ''" onblur="if( this.value == '' ) this.value = 'Username'"/>
            	 <input id="password" title="Please enter your password" name="password" type="password" class="text" value="Password" size="60" maxlength="60" onfocus="if(this.value == 'Password') this.value = ''" onblur="if( this.value == '' ) this.value = 'Password'"/>
              <input name="submit" src="images/Red-Button-Background.gif" type="image" class="button" value="Sign In" />
        </form>
      </div>
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
