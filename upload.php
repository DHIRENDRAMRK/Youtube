<?php

include ('./includes/header.php');
include('loggedin.php');
//phpinfo();

if(isset($_FILES['video']))

{ 

$title =$_POST['video_title'];
$desc =$_POST['video_description'];
$keywords =$_POST['video_keywords'];
$privacy =$_POST['privacy'];


		if(!empty(($title)&&($desc) &&($keywords)&&($privacy)))
		
		{
			$chars ='abcdefighijklmnopqrstuvwxyzABXDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$video_id =substr(str_shuffle($chars),0,15);
	$video_id=md5($video_id);
			
			 
			 
		}
		
		else
		{
			
			die('empty fields');
			
		}

	if(($_FILES['video']['type']=='video/mp4'))

	{
		
		$chars ='abcdefighijklmnopqrstuvwxyzABXDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$random_directory =substr(str_shuffle($chars),0,15);
		//mkdir('data/channels/images/icons/'.$random_directory.'');
		
		
		if(file_exists('data/users/video/'.$random_directory.''.$_FILES['video']['name']))
		{
		
			echo 'video exists' ; 
			
		}
		
		else
		{
			
			
			move_uploaded_file($_FILES['video']['tmp_name'],'data/users/videos/'. $random_directory. ''.$_FILES['video']['name']);
			$img_name =$_FILES['video']['name'] ;
			$filename='data/users/videos/'.$random_directory.''.$_FILES['video']['name'];
			$md5_file=(md5_file($filename));
			
			$check_md5 =mysql_query("SELECT file_md5 FROM videos WHERE file_md5='$md5_file'");
			
			if(mysql_num_rows($check_md5)!=0)
			{
				
				unlink($filename);
				die('This is a dublicate upload');
				
			}
			
			$date=date("F,j,Y");
			$insert =mysql_query("INSERT INTO videos VALUES ('','$title','$desc','$keywords','$user','$privacy','$date','0','$video_id','','$filename','images/thumbnail.php','no')");
			mysql_query("UPDATE videos SET file_md5='$md5_file' where video_id='$video_id'");
			$profile_pic =$random_directory.$img_name ;
			//$assoc_profile_pic= mysql_query("UPDATE users SET profile_pic='$profile_pic' WHERE username='$user'");
			die("The video was uploaded successfully");
			
			}
			
		
		}


	else
		
	die('invalid file type');	

	}


?>

<h2> Upload your video </h2>

<form action='upload.php' method='POST' enctype='multipart/form-data'>

Video Title<input type='text' name='video_title' value=''/><br/><br/>


Video Description:</br>
<textarea rows='10' cols='40' name='video_description'></textarea><br/><br/>

Privacy: <input type='radio' name='privacy' value='Public ' >Public
        <input type='radio' name='privacy' value='Private ' >Private
		<br/>
		

Video Keywords <input type='text' name='video_keywords' value=''/><br/><br/>

<input type='file' name='video' value='Upload your Videos'>
<input type='submit' name='submit' value='Upload ' >

</form>


