<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>

<link href="css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#content #row {
	height: 159px;
	width: 99%;
	margin-right: auto;
	margin-left: auto;
	clear: both;
	float: none;
	margin-bottom: 0.6%;
}
#content #row #button {
	float: left;
	height: 159px;
	width: 16.26%;
	margin-right: 0.4%;
	/* [disabled]background-color: #FF0; */
}
</style>
</head>

<body >

<div id="container">
	<div id="header">
    	<div id="logo"> <a href="#"><img src="images/logo.png" width="498" height="173" /></a> 
        
        </div>
        <div id="account" >
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
    	<div id="row">
        	<div id="button"><a href="class.php?class=introtopython"><img src="images/Intro-To-Python.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=commenting"><img src="images/Commenting.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=variablesanddatatypes"><img src="images/Variables-And-Data-Types.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=ifstatments"><img src="images/If-Statments.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=loops"><img src="images/Loops.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=modularprogrammingstructure"><img src="images/Modular-Programming-Structure.gif" width="100%" height="100%" /></a></div>
        </div>
        <div id="row">
        	<div id="button"><a href="class.php?class=datastructures"><img src="images/Data-Structures.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=testinganddebugging"><img src="images/Testing-And-Debugging.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=fileio"><img src="images/File-IO.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=objects"><img src="images/Objects.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=sockets"><img src="images/Sockets.gif" width="100%" height="100%" /></a></div>
            <div id="button"><a href="class.php?class=gui"><img src="images/GUI.gif" width="100%" height="100%" /></a></div>
        </div>  
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
