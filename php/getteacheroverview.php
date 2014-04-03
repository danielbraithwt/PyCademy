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

if( $_SESSION['acctype'] == 1 )
{
	$result = mysql_query("SELECT * FROM users WHERE cypher = '" . $_SESSION['cypher'] . "'");

	if( mysql_num_rows($result) != 0 )
	{
		while( $row = mysql_fetch_array($result) )
		{
			if( $row['acctype'] == 0 )
			{
				$student = mysql_query("SELECT * FROM finished WHERE username='" . $row['username'] . "'");
				$tutscompleated = mysql_num_rows($student);
				
				echo "<a onclick=\"expand('" . $row['username'] . "')\"><div id='studentinfo'>";
				echo "<div id=\"basicinfo\">";
				echo "<div id='left'>";
				echo "<p>" . $row['fullname'] . "</p>";
				echo "</div>";
				echo "<div id='mid'></div>";
				echo "<div id='right'>";
				echo "<p>" . $tutscompleated . "/21</p>";
				echo "</div>";
				echo "</div></a>";
				
				echo "<div id='" . $row['username'] . "' class=\"courseinfohide\">";
				
				while( $course = mysql_fetch_array($student) )
				{
					echo "<div id=\"course\">";
					echo "<div id=\"coursetopic\">";
					echo $course['topic'];
					echo "</div>";
					echo "<div id=\"popuplink\">";
					echo "<a href=\"#\" onclick=\"openCodePopup('" . $row['username'] . "', '" . $course['topic'] . "')\">View Code</a>";
					echo "</div>";
					echo "</div>";
				}
				
				echo "</div>";
				echo "</div>";	
			}
		}	
	}	
}
else
{
	echo "<div id='studentinfo'>You do not have access to this page</div>";
}



?>