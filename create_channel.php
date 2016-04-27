<?php

include ('includes/header.php');
include('loggedin.php');

if(isset($_POST['create_channel']))
{
	
	$channel_name =@$_POST['channel_name'];

$date =date("Y-m-d");	

$channel_check=mysql_query("SELECT channel_name FROM channels WHERE created_by='$user'");
$numrows_cc =mysql_num_rows($channel_check);

if($numrows_cc <5)
{
	
$channel_name_db =mysql_query("SELECT channel_name FROM channels WHERE channel_name='$channel_name'  ");
$numrows =mysql_num_rows($channel_name_db);

	if($numrows!=0)
	{	
	echo 'That channel already exists';
	}
	else if($channel_name== '')
	{
		echo '';
		 
	}
	else {
	$create_channel=mysql_query("INSERT INTO channels VALUES('','$channel_name','$user','$date','')");

		if($create_channel)
		{
			echo '<br/>';
		echo "your channel was created successfully";
		}
		else
			
		die(mysql_error());
	}

}
	else
	{
		echo 'You can only create 5 channels';
		
	}
	
}

?>



<h2> Create Your Channel </h2>
<br/>
<hr>

<form action='create_channel.php' method='POST'>
<input type='text' name='channel_name' size='40' maxlength='32' value='Give your channel a name' onclick='value=""' />


<input type='submit' name='create_channel' value='Create channel'>


</form>