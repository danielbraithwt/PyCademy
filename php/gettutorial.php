
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

$usercode = "You must sign in to use this intepreter";
$codedata;

if( $_SESSION['fullname'] )
{	
	$result = mysql_query("SELECT * FROM usercode WHERE username='" . $_SESSION['username'] . "' AND topic='" . $_GET['topic'] . "'");
	if( mysql_num_rows($result) == 1 )
	{
		$codedata = mysql_fetch_array($result);
		$usercode = str_replace("\\n", "\r\n", $codedata['code']);
		//$usercode = $codedata['code'];
	}
	else 
	{
		$usercode = "";
		$result = mysql_query("INSERT INTO usercode(username, topic) VALUES('" . $_SESSION['username'] . "', '" . $_GET['topic'] . "')");
		$result = mysql_query("SELECT * FROM usercode WHERE username='" . $_SESSION['username'] . "' AND topic='" . $_GET['topic'] . "'");
		$codedata = mysql_fetch_array($result);
	}
}

$result = mysql_query("SELECT * FROM tutorials WHERE id='" . $_GET['class'] . "' AND topic='" . $_GET['topic'] . "'");
$row = mysql_fetch_array($result);

$isadvanced = $row['isadvanced'];

$tutorialtext = $row['tutorialtext'];

$tutorialtext = str_replace('"', '\"', $tutorialtext);
$tutorialtext = str_replace('\\\"', '\"', $tutorialtext);
//$tutorialtext = str_replace("'", "\'", $tutorialtext);
$tutorialtext = str_replace("&", "&amp;", $tutorialtext);
$tutorialtext = str_replace("<", "&lt;", $tutorialtext);
$tutorialtext = str_replace(">", "&gt;", $tutorialtext);
$tutorialtext = str_replace("\n", '<br>', $tutorialtext);
$tutorialtext = str_replace("\r", '', $tutorialtext);

$startingtext = explode('//&lt;NEWSLIDE&gt;//', $tutorialtext);

$result = mysql_query("SELECT * FROM finished WHERE username='" . $_SESSION['username'] . "' AND topic='" . $_GET['topic'] . "'");
$hasfinished = "false";
if( mysql_num_rows($result) == 1 ) $hasfinished = "true";

?>


