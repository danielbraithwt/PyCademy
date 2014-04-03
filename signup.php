<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Signup</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#container #content #signupform {
	height: 900px;
	width: 400px;
	background-image: url(images/Sign-Up-Form-Background.gif);
}
#signupform form #radio {
	+height: auto;
	width: 405px;
	clear: both;
	float: none;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
}
#signupform form #radio #left {
	float: left;
	height: 100px;
	width: 100px;
	/* [disabled]padding-left: 0px; */
	margin-left: 100px;
	text-align: center;
}
#signupform form #radio #right {
	width: 100px;
	float: right;
	height: 100px;
	margin-right: 100px;
	margin-left: 5px;
}
.tooltip
{
	display: none;
	background-color: #FFF;
	font-size: 12px;
	height: 70px;
	width:160px;
	padding:25px;
	position:absolute;		
}
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/formjs-signup.js"></script>

<script type="text/javascript">

function valadateSignup()
{
	var valid = true;
	
	if( namevalid == false )
	{
		valid = false;
		document.getElementById("fullname").style.background = "rgba(255, 0, 0, 0.4)";
		
		// Show message
		$('#fullname').attr('title', namemsg);
		$('#fullname').mouseenter();
	}
	else 
	{
		document.getElementById("fullname").style.background = "rgba(255, 255, 255, 0.8)";
		
		// Change message back to default
		$('#fullname').attr('title', 'Enter your name here');
	}
	
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
		$('#username').attr('title', 'Enter your username, must be more than 6 charactors and cant contain special charactors e.g. *, \\');
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
		$('#password').attr('title', 'Enter your password, must be more than 6 charactors and cant contain special charactors e.g. *, \\');
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
	$('#signupform [title]').tooltip({ position: { my: "right+120 center", at: "right+120 center" }, opacity: 0.7 });
	
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
    	<div id="signupform" class="form">
        	<div id="title">
       	    <img src="images/signup-text.png" width="300" height="84" /> </div>
        	<form action="php/signup.php" onsubmit="return valadateSignup()" method="post" name="signup">
            	  <input title="Enter your name here" autocomplete="off" id="fullname" name="fullname" type="text" class="text" value="Full Name" size="60" maxlength="60" onkeyup="checkName(this)" onfocus="if(this.value == 'Full Name') this.value = ''" onblur="if( this.value == '' ) this.value = 'Full Name'" />
            	  <input title="Enter your username, must be more than 6 charactors and cant contain special charactors e.g. *, \\" autocomplete="off" id="username" name="username" type="text" class="text" value="Username" size="60" maxlength="60" onkeyup="checkUsrname(this)" onfocus="if(this.value == 'Username') this.value = ''" onblur="if( this.value == '' ) this.value = 'Username'" />
            	  <input title="Enter your password, must be more than 6 charactors and cant contain special charactors e.g. *, \\" autocomplete="off" id="password" name="password" type="password" class="text" value="Password" size="60" maxlength="60" onkeyup="checkPassword(this)" onfocus="if(this.value == 'Password') this.value = ''" onblur="if( this.value == '' ) this.value = 'Password'"/>
           	  <div id="radio">
              	<div id="left">
              	<label><div id="radiotitle"><strong>Student</strong></div><input onclick="checkCypher(document.getElementById('cypher'))" name="acctype" type="radio" class="radio" name="student" id="student" value="student"/></label>
                </div>
                <div id="right">
                <label><div id="radiotitle"><strong>Teacher</strong></div><input onclick="checkCypher(document.getElementById('cypher'))" name="acctype" type="radio" class="radio" name="teacher" id="teacher" value="teacher"/>
                </label>
                </div>
              </div>
              <input title="Enter your teachers 3 charactor cypher here, No teacher? just enter 'nul'" autocomplete="off" id="cypher" name="cypher" type="text" class="text" value="Cypher" size="30" maxlength="3" onkeyup="checkCypher(this)" onfocus="if(this.value == 'Cypher') this.value = ''" onblur="if( this.value == '' ) this.value = 'Cypher'"/>
              
              <input name="submit" src="images/Blue-Button-Background.gif" class="button" type="image" value="Submit" />
            </form>
        </div>
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
