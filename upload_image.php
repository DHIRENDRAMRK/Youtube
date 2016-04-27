<?php
include ('./includes/header.php');
include('loggedin.php');
if(isset($_FILES['channel_pic']))

{
		
	if(($_FILES['channel_pic']['type']=='image/jpeg')||($_FILES['channel_pic']['type']=='image/png')||$_FILES['channel_pic']['type']=='image/gif')

	{
		
		$chars ='abcdefighijklmnopqrstuvwxyzABXDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$random_directory =substr(str_shuffle($chars),0,15);
		//mkdir('data/channels/images/icons/'.$random_directory.'');
		
		
		if(file_exists('data/users/images/icons/'.$random_directory. ''.$_FILES['channel_pic']['name']))
		{
			echo 'image exists' ;
			
		}
		
		else{
			
			move_uploaded_file($_FILES['channel_pic']['tmp_name'],'data/users/images/icons/'. $random_directory. ''.$_FILES['channel_pic']['name']);
			$img_name =$_FILES['channel_pic']['name'] ;
			$profile_pic =$random_directory.$img_name ;
			$assoc_profile_pic= mysql_query("UPDATE users SET profile_pic='$profile_pic' WHERE username='$user'");
			die("The image was uploaded successfully");
		}
	}


	else
	die('invalid file type');	

	}

?>

<h2> Upload your channel image </h2>

<form action='upload_image.php' method='POST' enctype='multipart/form-data'>

<input type='file' name='channel_pic' value='Upload your Image'>
<input type='submit' name='submit' value='Upload Image' >

</form>

