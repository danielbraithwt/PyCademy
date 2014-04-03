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

$classid = $_GET['class'];
$result = mysql_query("SELECT * FROM tutorials WHERE id = '" . $classid . "'");

while( $row = mysql_fetch_array($result) )
{
	echo "<a href='tutorial.php?class=" . $row['id'] . "&topic=" . $row['topic'] . "'>";
	echo "<div id='topic'>";
	echo "<div id='left'>";
	echo "<p>" . $row['topic'] . "</p>";
	echo "</div>";
	echo "<div id='middle'></div>";
	echo "<div id='right'>";
	echo "<p>" . $row['diffculty'] . "</p>";
	echo "</div>";
	echo "</div>";
	echo "</a>";
}

?>