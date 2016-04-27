<?php

include('/includes/header.php');
?>


<br><br><br>
<?php

$get_videos =mysql_query("SELECT * FROM videos ORDER by date_uploaded DESC");

	if(mysql_num_rows($get_videos)==0)

	{
		echo 'There are no videos yet';
		
		
	}
	
	
	else
	{
			while($row=mysql_fetch_assoc($get_videos))
			{
				
				$id=$row['id'];
			$video_title=$row['video_title'];
			$video_description	=$row['video_description'];
			$video_keywords=$row['video_keywords'];
			$uploaded_by=$row['uploaded_by'];
			$privacy=$row['privacy'];
			$date_uploaded=$row['date_uploaded'];
			$views =$row['views'];
			$video_id=$row['video_id'];
		   $thumbnail =$row['thumbnail'];
		   $deleted =$row['deleted'];
		   ?>
		   
		 
		 
			<div class ="myvideosdiv" style="max-height:100px">
				
				<div style="float:left;">
				
				<img src="data/users/videos/thumbnails/<?php echo $thumbnail; ?>" height="80px" width="150px" />
				
				</div>
				
				<a href="watch.php?videoid=<?php echo $video_id?> "><h2><?php echo $video_title ; ?><h2>
				</a>
				
				<div class="myvideosdiv_desc">
				<?php echo $video_description ; ?></div >
				<br>
				
				Video views:<?php echo $views ; ?>
				
				
				</div>
		 

		 <?php
					
				
			}
		
		
	}


?>