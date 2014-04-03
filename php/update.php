

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Updated</title>

<link href="../css/layout.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#content {
	background-color: #FFF;
	height: 200px;
	width: auto;
}
</style>

<?php

session_start();

include 'includes.php';
$con = mysql_connect($host, $user, $pass);
if (!$con)
{
  echo "Failed to connect to MySQL";
  exit();
}

mysql_select_db($db, $con);

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$cypher = strtolower(trim($_POST['cypher']));

//echo $username . "\n";
//echo $password . "\n";
//echo $cypher . "\n";
//echo $_SESSION['username'] . "\n";

$result = mysql_query("UPDATE users SET username='" . $username . "', password='" . $password . "', cypher='" . $cypher . "' WHERE username='" . $_SESSION['username'] . "'");

echo mysql_error();

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['cypher'] = $cypher;

$info =  "<a href='../index.php'> Click Here if you dont automatically get redirected to the home page</a>";
//header("refresh:2;location:../index.php");

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
    	<img src="../images/detsupdated.png" width="400" height="37" />
        <br />
		<?php 
			echo $info;
			echo "<script type=\"text/javascript\">setTimeout(\"location.href = 'http://www.pycademy.org';\", 2000);</script>";
			exit();
		?> 
    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>