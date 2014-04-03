<html>
<head>

<style type="text/css">
#container #content {
	background-color: #FFF;
	height: auto;
	width: 800px;
	padding-top: 50px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 50px;
	margin-right: auto;
	margin-left: auto;
}
</style></head>

<link href="css/layout.css" rel="stylesheet" type="text/css">
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
    	<p>To get setup with python is very simple, first click the link to download the python installer, <a href="http://www.python.org/getit/">http://www.python.org/getit/</a> there are multiple versions make sure you get python 2.7.5 for what ever operating system you are running these tutorials on. Once downloaded just run the executable and follow the instructions like you would with any installer.

Once installed you want to run "IDLE ( Python GUI )" it should be in the start menu on windows or equivalent on other OS's, this should open up a python interpreter that looks like the following.</p>

  <img src="images/interpexample.jpg" width="682" height="718"> 
  
  <p>Here you can type in commands and they will be executed immediately though this isn't very useful if you are writing a program, so go to the file menu then click new, this will open up a new window that you can write your code into, press F5 to run your program. One important thing to remember is that when saving your python script make sure you add a .py to the end of the file name because otherwise it won't be saved as a python file and you can't run it.</p>
  
  </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>