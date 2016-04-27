<?php

include ('includes/header.php');

$error ="";

if(isset($_POST['register']))
{
	$date= date("m d Y");

	
	$firstname =strip_tags(($_POST['firstname']));
	$lastname =strip_tags(($_POST['lastname']));
	$username =strip_tags($_POST['username']);
	$email =strip_tags($_POST['email']);
	$password1 =strip_tags($_POST['password']);
	$password2 =strip_tags($_POST['passwordrepeat']);
	
		$day =strip_tags($_POST['day']);
	$month =strip_tags($_POST['month']);
	$year =strip_tags($_POST['year']);

	$dob="$day/$month/$year";
	
	if($firstname=="")
	{
		$error="first name cannot be empty" ;
		
	}
	
	
	else if($lastname=="")
	{
		$error="last name cannot be empty" ;
		
	}
	else if($username=="")
	{
		$error="username name cannot be empty" ;
		
	}
	 else if($email=="")
	{
		$error="email cannot be empty" ;
		
	}
	else if($password1=="")
	{
		$error="password cannot be empty" ;
		
	}
	
	
	else if($password2=="")
	{
		$error="repeat password cannot be empty" ;
		
	}

	
	else if($day=="")
	{
		$error="day cannot be empty" ;
		
	}
	else if($month=="")
	{
		$error="month cannot be empty" ;
		
	}
	else if($year=="")
	{
		$error="year cannot be empty" ;
		
	}
	
	
	
	
	
	
echo '<h2>'. $error .'</h2>';		



$check_username=mysql_query("SELECT username FROM users WHERE username='$username' ");
$numrows_username =mysql_num_rows($check_username);
if($numrows_username!=0)
{
	
	echo $error='That username has already been registered.';
	
}
else
{
	
$check_username=mysql_query("SELECT email FROM users WHERE email='$email' ");
$numrows_username =mysql_num_rows($check_username);

if($numrows_username!=0)
{
	
	echo $error='That email has already been registered.';
	
}




else
{
	
$password1 =md5($password1);


$password2 =md5($password2);


if($password1!=$password2)
{
echo $error ='The passwords don\'t match';	

}

else
{
	$register =mysql_query("INSERT INTO users VALUES ('','$firstname','$lastname','$username','email','$password1','$dob','no','','$date')");
	if(!$register)
		die(mysql_error());
	else
	{
	die('Reigstered successfully');
	}
	
}
}


}
}
?>

<h2>Create Your Account </h2>

<form action="join.php" method="POST">
<input type='text' name='firstname' value='Firstname...' onclick='value=""' /><p/>
<input type='text' name='lastname' value='Lastname...' onclick='value=""' /><p/>

<input type='text' name='username' value='Username...' onclick='value=""' /><p/>
<input type='text' name='email' value='Email...' onclick='value=""' /><p/>
<input type='password' name='password' value='password...' onclick='value=""' /><p/>
<input type='password' name='passwordrepeat' value='Repeat password...' onclick='value=""' /><p/>

<input type='text' name='day' maxlength='2' value='' size='3' nclick='value=""' />
<input type='text' name='month' maxlength='2' value='' size='6' onclick='value=""' />
<input type='text' name='year' maxlength='4'  value='' size='4' onclick='value=""' /><p/>


<input type ='submit' name='register' value='Create your account' /> <p/>


</form>
