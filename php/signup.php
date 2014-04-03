<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account Created</title>

<link href="../css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#content {
	background-color: #FFF;
	height: 200px;
	width: auto;
}
</style>

<?php

include 'includes.php';
$con = mysql_connect($host, $user, $pass);
if (!$con)
{
  echo "Failed to connect to MySQL";
  exit();
}

mysql_select_db($db, $con);

$result = "";

// Get the input from the form and put it into variables
$name = trim($_POST["fullname"]);
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
// So people cant change html code and create a new account type
$acctype = -1;
if( $_POST["acctype"] == "student" ) $acctype = 0;
else if( $_POST["acctype"] == "teacher" ) $acctype = 1;
$cypher = strtolower(trim($_POST["cypher"]));

if($acctype != -1)
{
	
	$result = mysql_query("INSERT INTO users(fullname, username, password, acctype, cypher) VALUES('" . $name . "', '" . $username . "', '" . $password . "', '" . $acctype . "', '" . $cypher . "')");
	$info = $info . "<a href='../index.php'> Click Here if you dont automatically get redirected to the home page</a>";
	//$result = mysql_query("SELECT * FROM users WHERE username = '" . $username . "'");
	// Detirmine if user name is taken
	//if( mysql_num_rows($result) != 0 ) echo "Username allready taken, please try a diffrent one";
	// Add user into database
	//else 
	//{
		
	//}
}
else echo "ERROR!";

mysql_close($con);

?>

</head>

<body>

<div id="container">
	<div id="header">
    	<div id="logo">
        <img src="../images/logo.png" width="498" height="173" /> 
        
        </div>
        <div id="account">
        </div>
    </div>
    
    <div id="error">
    	<img src="../images/congratspage.png" width="400" height="86" />
        <br />
		<?php 
			echo $info;
			echo "<script type=\"text/javascript\">setTimeout(\"location.href = 'http://www.pycademy.org';\", 2000);</script>";
		?> 
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
