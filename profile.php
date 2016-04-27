<?php

include ('includes/header.php');
include('loggedin.php');
$username =$_GET['u'];
$check_username =mysql_query("SELECT * FROM users WHERE username='$username'");
$count=mysql_num_rows($check_username);

if($count==1)
{
	while($row=mysql_fetch_assoc($check_username))
	{
		$id=$row['id'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
	
		$email=$row['email'];
	
		
echo "<h2> $username's Profile <br/><br/>

  Name= $firstname $lastname <br/>
  Email= $email  </h2> ";	
	
	
$getvideos =mysql_query("SELECT * FROM videos WHERE uploaded_by='$firstname'");
$numrows =mysql_num_rows($getvideos);
if($numrows==0)
{
	die($firstname. ' haven\'t uploaded any videos');
	
}
else
{
	while($row=mysql_fetch_assoc($getvideos))
	{
		
		$title = $row['video_title'];
		$desc = $row['video_description'];
		$keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy  =$row['uploaded_by'];
		$date_uploaded =$row['privacy'];
	    $thumbnail = $row['thumbnail'];
	    $videoid = $row['video_id'];
		$deleted = $row['deleted'];
		
		if($deleted=="no")
		{
			
			
		
		
		?>
		
	<div class ="myvideosdiv" >
		
		<div style="float:left;">
		
		<img src="data/users/videos/thumbnails/<?php echo $thumbnail; ?>" height="80px" width="150px" />
		
		</div>
		<h2>
		<a href="watch.php?videoid=<?php echo $videoid?>"> <?php echo $title ; ?>
		</a>
		
		<div class="myvideosdiv_desc">
		<?php echo $desc ; ?></div >
		<br>
		
		<div> <a href="edit_video.php?videoid=<?php echo $videoid ;?>" >Edit Video</a> |<a href="upload_thumbnail.php?videoid=<?php echo $videoid ;?>">Edit Thumbnail</a> |<a href="delete_video.php?videoid=<?php echo $videoid ;?>">Delete Video</a></div>
		
		
		
		<div class="myvideosdiv_tags" >
		
		<strong>Tags:</strong>
		<?php echo $keywords ; ?>
		</div>
		
		</h2>
		</div>
		<?php
		
	}
	else{
		
		echo $firstname." haven\'t uploaded any videos or your videos got deleted";
	}
	
}

	}
	}
}
else
{
	header("Location:header.php");
	
}

?>
	
	
	
	
	
	
	