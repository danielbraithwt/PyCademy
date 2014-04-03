<?php

include 'includes.php'; // Secure way of storing login details
$con = mysql_connect($host, $user, $pass);
if (!$con)
{
	// Alert user the connection failed
  echo "Failed to connect to MySQL";
  exit();
}

//Login scusessfull, change database
mysql_select_db($db, $con);

// Get form variables
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

// Run query to retreve user info that matches that description
$result = mysql_query("SELECT * FROM users WHERE username = '" . $username . "'" . "AND password = '" . $password . "'");
$userinfo = mysql_fetch_array($result);
$count = mysql_num_rows($result);

// If there is a user with that username and password
if( $count == 1 )
{
	// Then login scusessfull
	// Create session
	session_start();
	
	// Insert all user data into session
	$_SESSION['fullname'] = $userinfo['fullname'];
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['acctype'] = $userinfo['acctype'];
	$_SESSION['cypher'] = $userinfo['cypher'];
	
	// Redirect to home page
	header("location:../index.php");
	exit();
} 

?>

</head>

<link href="../css/layout.css" rel="stylesheet" type="text/css" />
<body>

<div id="container">
	<div id="header">
    	<div id="logo">
        <a href="index.php"><img src="../images/logo.png" width="498" height="173" /></a> 
        
        </div>
        <div id="account">
        </div>
    </div>
    
    <div id="error">
    	<?php 
			echo "<img src='../images/errorpage-opps.png' width='300' height='91' />";
			echo "<br>";
			echo "Wrong Username or Password<br>";
			echo "<a href='../login.php'>Click here</a> to try again or <a href='../signup.php'>click here </a>to make an account";
			exit();
		?>
   	    </div>
    
    <div id="footer">
    </div>
</div>

</body>
</html>
