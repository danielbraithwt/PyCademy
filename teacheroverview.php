<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher Overview</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#studentinfo {
	height: auto;
	width: 780px;
	margin-right: auto;
	margin-left: auto;
	clear: both;
	margin-bottom: 10px;
	background-color: #FFF;
}
#left     {
	float: left;
	height: 50px;
	width: 200px;
	margin-right: 280px;
	text-align: center;
	margin-left: 20px;
}
#mid     {
	background-color: #000;
	float: left;
	width: 2px;
	margin-right: 100px;
	height: 50px;
}
.courseinfohide {
	float: right;
	height: 0px;
	width: 0px;
	/* [disabled]margin-right: 20px; */
	background-color: #FFF;
	/* [disabled]margin-bottom: 20px; */
	visibility: hidden;
	margin-top: 10px;
	margin-bottom: 10px;
}
.courseinfoshow {
	float: right;
	height: auto;
	width: 750px;
	/* [disabled]margin-right: 20px; */
	background-color: #FFF;
	/* [disabled]margin-bottom: 20px; */
	visibility: visible;
	margin-top: 10px;
	margin-bottom: 10px;
}
#basicinfo {
	height: 50px;
	width: 780px;
	background-color: #FFF;
}
#course {
	height: 20px;
	width: 750px;
	background-color: #FFF;
	float: left;
}
#right     {
	float: left;
	height: 50px;
	width: 100px;
	text-align: center;
}


#container #content #teacheroverview {
	/* [disabled]background-color: #FF0; */
	height: auto;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/Teacher-Overview-Backgound.gif);
	padding-bottom: 10px;
}

#coursetopic {
	float:left;
	text-align: left;
	width: 200px;
	padding-right: 400px;
	padding-left:20px;
}

#popuplink {
	text-align:left;
	float:left;
}
</style>

<script type="text/javascript">

var current = "";

function expand(user)
{
	if(current != "") document.getElementById(current).className = "courseinfohide";
	if(current != user) 
	{
		document.getElementById(user).className = "courseinfoshow";
		current = user;
	}
	else if(current == user) current = "";
}

function openCodePopup(username, topic)
{
	popupWindow = window.open('displayusercode.php?username=' + username + '&topic=' + topic, 'popupWindow', 'popUpWindow','height=700,width=800,left=10,top=10,resizable=no,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
}

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
   	  <div id="teacheroverview">
        
        	<div id="title">
   	    <img src="images/teacheroverview-text.png" width="409" height="80" /> </div>
            
   	    <?php include 'php/getteacheroverview.php'; ?>
        
        <br style="clear:both;" />
        	
      </div>
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
