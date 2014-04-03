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

$result = mysql_query("SELECT * FROM finished WHERE username='" . $_SESSION['username'] . "' AND topic='" . $_GET['topic'] . "'");
if( mysql_num_rows($result) == 0 ) $result = mysql_query("INSERT INTO finished(username, topic) VALUES('" . $_SESSION['username'] . "', '" . $_GET['topic'] . "')");

//echo mysql_num_rows($result);
?>