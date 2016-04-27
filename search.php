<?php

include ('includes/header.php');


?>


<br><br><br>

<?php

if(isset($_POST['search_button']))
	
	{
		if(!empty($_POST['search_box']))
		{
			
		$search =$_POST['search_box'];

		
		$search=trim(htmlentities(strip_tags(mysql_real_escape_string($search))));
        $terms =explode(" ",$search);
		
		$query ="SELECT * FROM videos WHERE ";			
			$i=0;
			
			
			
			foreach ($terms as $each)
			{
				$i++;
				
				if($i==1)
				$query .= "video_keywords LIKE '%$each%'";
			
			else
			{
				$query .="OR video_keywords LIKE '%$each%' ";
				
				
			}
				
				
			}
			
			
			$query =mysql_query($query);
			$numrows =mysql_num_rows($query);
			
			
			if($numrows >0)
			
			{
				while($row =mysql_fetch_assoc($query))
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
		
		}
		
		
else
{
	
die('please input something in search box');	
	
	
}
		
}

else
{
	
		header("Location:index.php");
}

?>
					
					
					





















