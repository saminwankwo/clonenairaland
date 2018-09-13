<?php

$db = mysqli_connect("$dbhost", "$dbuser", "$dbpass") 
		or die("Could not connect.");

if(!$db)
die("no db");

if(!mysqli_select_db($db, "$dbname")){

	die("Sorry, No database selected");
}


if (!get_magic_quotes_gpc()) {

	$_GET = array_map('mysqli_real_escape_string', $_GET);
	$_POST = array_map('mysqli_real_escape_string', $_POST);
	$_COOKIE = array_map("mysqli_real_escape_string", $_COOKIE);

} else {

	$_GET = array_map('stripslashes', $_GET);
	$_POST = array_map('stripslashes', $_POST);
	$_COOKIE = array_map('stripslashes', $_COOKIE);
	$_GET = array_map('mysqli_real_escape_string', $_GET);
	$_POST = array_map('mysqli_real_escape_string', $_POST);
	$_COOKIE = array_map('mysqli_real_escape_string', $_COOKIE);

}

?>