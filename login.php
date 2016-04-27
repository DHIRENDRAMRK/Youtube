<?php

include ('./includes/header.php');


if(isset($_POST['username'])&&($_POST['password']))
{
	$username=strip_tags($_POST['username']);
		$password=strip_tags($_POST['password']);
		
$check_username =mysql_query("SELECT username FROM users WHERE username='$username'");
$numrows=mysql_num_rows($check_username);
	
	if($numrows!=1)
	{
		echo 'That user doesnt exists';
		
	}	
	
	else
	{
		$password=md5($password);

	$check_password =mysql_query("SELECT password FROM users WHERE password='$password' AND username='$username'");

	while($row=mysql_fetch_assoc($check_password))
	{
		
	$password_db=$row['password'];	
		
		
		if($password_db==$password)
		{
			$_SESSION['username']=$username ;
			header("Location:members.php");
			
		}
		
	}


	}
}





?>

<h2>Login to ur account </h2>
<form action='login.php' method='POST' >

<input type='text' name='username' value='Username...' onclick='value=""' />
<p/>


<input type='password' name='password' value='Password...' onclick='value=""' />
<p/>

<input type='submit' name='submit' value='login to my account' />


</form>