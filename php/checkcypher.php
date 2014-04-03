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

$result = mysql_query("SELECT * FROM users WHERE acctype=1 AND cypher='" . strtolower(trim($_GET['cypher'])) . "'");
if(mysql_num_rows($result) == 1) 
{
	$usr = mysql_fetch_array($result);
	if( $usr['username'] == $_SESSION['username'] ) echo "false";
	else echo "true";
}
else echo "false";

?>