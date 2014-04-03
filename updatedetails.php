<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Details</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#container #content #updatedetailsform {
	height: 700px;
	width: 400px;
	/* [disabled]background-color: #FF0; */
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/Update-Details-Form-Background.gif);
}
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/formjs-update.js"></script>

<script type="text/javascript">

function valadateUpdate()
{
	var valid = true;
	
	if( usrvalid == false )
	{
		valid = false;
		document.getElementById("username").style.background = "rgba(255, 0, 0, 0.4)";
		
		// Show message
		$('#username').attr('title', usrmsg);
		$('#username').mouseenter();
	}
	else 
	{
		document.getElementById("username").style.background = "rgba(255, 255, 255, 0.8)";
		
		// Change message back to default
		$('#username').attr('title', 'Enter your username, must be more than 6 charactors');
	}
	
	if( passwdvalid == false )
	{
		valid = false;
		document.getElementById("password").style.background = "rgba(255, 0, 0, 0.4)";
		
		// Show message
		$('#password').attr('title', passwdmsg);
		$('#password').mouseenter();
	}
	else 
	{
		document.getElementById("password").style.background = "rgba(255, 255, 255, 0.8)";
		
		// Change message back to default
		$('#password').attr('title', 'Enter your password, must be more than 6 charactors');
	}
	
	if( cypvalid == false )
	{
		valid = false;
		document.getElementById("cypher").style.background = "rgba(255, 0, 0, 0.4)";
		
		// Show message
		$('#cypher').attr('title', cypmsg);
		$('#cypher').mouseenter();
	}
	else 
	{
		document.getElementById("cypher").style.background = "rgba(255, 255, 255, 0.8)";
		
		// Change message back to default
		$('#cypher').attr('title', 'Enter your teachers 3 charactor cypher here, No teacher? just enter \'nul\'');
	}
	
	return valid;
}

</script>

<script>

$(function() {
	$('#updatedetailsform [title]').tooltip({ position: { my: "right+120 center", at: "right+120 center" }, opacity: 0.7 });
	
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
			session_start();
		
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
    	<div id="updatedetailsform" class="form">
        	<div id="title">
            	<img src="images/updatedetails-text.png" width="300" height="75" />
       	     </div>
            <?php
			
			session_start();
			
			echo '<form action="php/update.php" onsubmit="return valadateUpdate()" method="post" name="updatedetails">';
			echo '<input title="Enter your new username here, must be more than 6 charactors and cant contain special charactors e.g. *, \\" autocomplete="off" onkeyup="checkUsrname(this)" id="username" name="username" type="text" class="text" value="' . $_SESSION['username'] . '" size="60" maxlength="60" onfocus="if(this.value==\'' . $_SESSION['username'] . '\') this.value = \'\'" onblur="if(this.value==\'\') this.value = \'' . $_SESSION['username'] . '\'" />';
			echo '<input title="Enter your new password here, must be more than 6 charactors and cant contain special charactors e.g. *, \\" autocomplete="off" onkeyup="checkPassword(this)" id="password" name="password" type="password" class="text" value="' . $_SESSION['password'] . '" size="60" maxlength="60" onfocus="if(this.value==\'' . $_SESSION['password'] . '\') this.value = \'\'" onblur="if(this.value==\'\') this.value = \'' . $_SESSION['password'] . '\'"/>';
			echo '<input title="Enter your teachers 3 charactor cypher here, No teacher? just enter \'nul\'" autocomplete="off" onkeyup="checkCypher(this)" id="cypher" name="cypher" type="text" class="text" value="' . $_SESSION['cypher'] . '" size="30" maxlength="30" onfocus="if(this.value==\'' . $_SESSION['cypher'] . '\') this.value = \'\'" onblur="if(this.value==\'\') this.value = \'' . $_SESSION['cypher'] . '\'"/>';
			echo '<input type="image" src="images/Green-Button-Background.gif" alt="Submit Form" class="button" value="Submit" />';
			echo'</form>';
			
			?>
        </div>
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
