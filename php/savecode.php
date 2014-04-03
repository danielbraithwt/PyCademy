<?php

// Start session
session_start();

include 'includes.php';
$con = mysql_connect($host, $user, $pass);
if (!$con)
{
  echo "Failed to connect to MySQL";
  exit();
}

// Change databse
mysql_select_db($db, $con);

// Get code and make changes to quote marks so they will be preserved
$code = str_replace("\\", "\\\\", utf8_decode($_GET['code']));
$code = str_replace('"', '\\"', $code);
$code = str_replace("'", "\\'", $code);

echo $code;

// Update the code in the database
$result = mysql_query("UPDATE usercode SET code='" . $code . "' WHERE id=" . $_GET['id']);

?>