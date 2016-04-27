<?php
include ('./includes/header.php');
include('loggedin.php');
$videoid =$_GET['videoid'];

$query=mysql_query("UPDATE videos SET deleted='yes' WHERE video_id='$videoid'");

if(!$query)
{
	die(mysql_error());
	
}

?>
