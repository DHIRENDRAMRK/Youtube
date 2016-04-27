<?php
include ('./includes/header.php');
include('loggedin.php');
?>

<br /> <br /> <br >

<?php


$getvideos =mysql_query("SELECT * FROM videos WHERE uploaded_by='$user'");
$numrows =mysql_num_rows($getvideos);
if($numrows==0)
{
	die('You havent uploaded the videos');
	
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
		
		<h2><?php echo $title ; ?><h2>
		
		
		<div class="myvideosdiv_desc">
		<?php echo $desc ; ?></div >
		<br>
		
		<div> <a href="edit_video.php?videoid=<?php echo $videoid ;?>" >Edit Video</a> |<a href="upload_thumbnail.php?videoid=<?php echo $videoid ;?>">Edit Thumbnail</a> |<a href="delete_video.php?videoid=<?php echo $videoid ;?>">Delete Video</a></div>
		
		
		
		<div class="myvideosdiv_tags" >
		
		<strong>Tags:</strong>
		<?php echo $keywords ; ?>
		</div>
		
		
		</div>
		<?php
		
	}
	else{
		
		echo "you haven\'t uploaded any videos or your videos got deleted";
	}
	
}}
?>
