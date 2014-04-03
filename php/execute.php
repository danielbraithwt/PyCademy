<?php

session_start();


$code = str_replace("\\n", PHP_EOL, utf8_decode($_GET['code']));
$code = str_replace("\\t", "	", $code);
$filepath = "../tmp/" .  $_SESSION['username'] . (string) rand() . ".py";

$file = fopen($filepath, "w") or die("Cant open file");
fwrite($file, $code);
fclose($file);

//echo $code;

$output = null;
exec("python " . $filepath . " 2>&1", $output);
unlink($filepath);

foreach( $output as $line )
{
	echo $line;
	echo "\n";
}

?>