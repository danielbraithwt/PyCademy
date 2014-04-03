<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Class</title>
<link href="css/layout.css" rel="stylesheet" type="text/css" /><style type="text/css">
#class #topics {
	height: auto;
	width: 800px;
	margin-top: 20px;
}
#container #content #class {
	/* [disabled]background-color: #FF0; */
	height: auto;
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	padding-bottom: 10px;
	background-image: url(images/Class-Background.gif);
}

#class #topics #topic {
	clear: both;
	height: 50px;
	width: 730px;
	margin-bottom: 20px;
	background-color: #FFF;
	padding-left: 50px;
	margin-right: auto;
	margin-left: auto;
}
#class #topics #topic #left {
	float: left;
	height: 50px;
	width: 200px;
	text-align: center;
	vertical-align: middle;
	margin-right: 200px;
}
#class #topics #topic #right {
	float: left;
	height: 50px;
	width: auto;
}
#class #topics #topic #middle {
	float: left;
	height: 50px;
	width: 2px;
	text-align: center;
	vertical-align: middle;
	background-color: #000;
	margin-right: 200px;
	margin-left: auto;
}
</style>
</head>

<body >

<div id="container">
	<div id="header">
    	
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
        
        <div id="logo"> <a href="index.php"><img src="images/logo.png" width="498" height="173" /></a> 
        
        </div>
    </div>
    
    <div id="content">
   	  <div id="class">
        	<div id="title">
       	    <img src="images/topics-text.png" width="316" height="80" /> 
            </div>
            
          <div id="topics">
     		
            <?php include 'php/getclass.php'; ?>
            
        </div>
    </div>
    
    <div id="footer">
    </div>
</div>
</div>

</body>
</html>
