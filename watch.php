<?php

include ('/includes/header.php');


$videoid=$_GET['videoid'];

$check =mysql_query("SELECT * FROM videos WHERE video_id='$videoid'");


if(mysql_num_rows($check)==1)
{
	while($row=mysql_fetch_assoc($check))
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
		$videosrc =$row['file_location'];
		$newviews=$views + 1;
		$updateviews =mysql_query("UPDATE videos SET views='$newviews' WHERE video_id='$video_id'");	

		?>
		
		
		

	<h2><?php echo $video_title?></h2>
	<div style="float:left;">
	<video width='520' height="300" controls>
	<source src="<?php echo $videosrc; ?>" type="video/mp4">


	</video>
	</div>

	<div style="float: right;margin:10px 0px 0px 5px;border:1px solid #ccc;
	background-color:#f2f2f2;min-height:100px;width:400px;">

	<p><strong>Video Description:</strong></p>

	<?php echo $video_description ;?>
	</div>
	</tr>
	<tr>
	<div style="float: right;margin:0px 0px 5px;border:1px solid #ccc;
	background-color:#f2f2f2;border-top:none;width:400px;">


	<p><strong>Video Tags:</strong></p>

	<?php echo $video_keywords ;?>

	</div>
	<div style="float:right;width:400px;font-size:14px;margin:0px 0px 0px 0px;font-weight:bold;">


	<?php echo $views;?> Views

	</div>
		
		
		<?php
		
		
		
		$check_l =mysql_query("SELECT type FROM ratings WHERE videoid='$video_id' AND username='$user' ");
		if(mysql_num_rows($check_l)!=0)
		{
			while($rating= mysql_fetch_assoc($check_l))
			{
			//	$videoid_l=$rating['videoid'];
				$type =$rating['type'];
			//	$user_l =$rating['username'];
				
				$d='';
				$d2='';
				
				
			
				if($type=='like')
				{
				$d ='disabled';	
				}
				else
				{
					$d2='disabled';
			
			}
			
		if(isset($_POST['like']))
		{
			
			
			$query=mysql_query("UPDATE ratings set type='like' WHERE videoid='$video_id' AND username='$user'");
			$d ='disabled';
			$d2='';
			if(!$query)
			{
				die(mysql_error());
				
			}
		}
		if(isset($_POST['dislike']))
		{
			

			$query=mysql_query("UPDATE ratings set type='dislike' WHERE videoid='$video_id' AND username='$user'");
				$d2='disabled';
				$d='';
			if(!$query)
			{
				die(mysql_error());
				
			}
		}
			
			
			}
			
			
		}
		
		else
		{
			$d="";
			$d2="";
			
			
			
		if(isset($_POST['like']))
		{
			
			$query=mysql_query("INSERT INTO ratings VALUES ('','$video_id','like','$user')");
			
			
			if(!$query)
			{
				die(mysql_error());
				
			}
		}
		if(isset($_POST['dislike']))
		{
			
			$query=mysql_query("INSERT INTO ratings VALUES ('','$video_id','dislike','$user')");
			
			
			if(!$query)
			{
				die(mysql_error());
				
			}
		}
			
			
			
		}
		
		
		
		
		if(isset($_POST['post_comment']))
			   {
				   
				   $date_commented =date("d F Y");
				   $comment_text=trim(htmlentities(strip_tags(mysql_real_escape_string($_POST['write_comment']))));
				   mysql_query(("INSERT INTO comments VALUES('','$user','$comment_text','$date_commented','$videoid')"));
				   
				   
				   
			   }
		 /*   calculate likes      */
		
		$get_likes =mysql_query("SELECT * FROM ratings WHERE videoid='$video_id' AND type='like'");
			   $num_of_likes=mysql_num_rows($get_likes);
			   
			   $get_dislikes =mysql_query("SELECT * FROM ratings WHERE videoid='$video_id' AND type='dislike'");
			   $num_of_dislikes=mysql_num_rows($get_dislikes);
			   
			   
			   $total_num =$num_of_likes+$num_of_dislikes;
			   
			   $total_width=180;
			   $green=0;
			   $red=0;
			   if($total_num!=0)
				   
				   {
			   $width_of_one=$total_width/$total_num;
			   
			   
			   $green=$width_of_one *$num_of_likes;
			  $red=$width_of_one *$num_of_dislikes;
			 
		/* add ratings */
			
				   }
		
		?>
		
		

			<div style=" width:700px;margin-top:50px">  
			   
			  <div style="float:left;px;margin-bottom:40px;width:1500px;">
			   
			   
				<div style="width:<?php echo $total_width?>;float:left">  
			   
				 
				<div style="width:<?php echo $red.'px' ?>;height:5px;background-color:red;float:left">  
			   
			   </div>
				<div style="width:<?php echo $green.'px' ?>;height:5px;background-color:green;float:left"> 
				
			   </div>
			   
			   <div style="float:left; padding-top:5px">
		
			   <form action="watch.php?videoid=<?php echo $video_id; ?>" method="POST">

	<input type ="submit" name="like" value="Like" <?php echo $d; ?> > 
	<input type ="submit" name="dislike" value="Dislike" <?php echo $d2; ?> >

	</form>	
		
		
			</div>
			   </div>
			   </div>
			   
			   
			   
			   <br>
	<form action="watch.php?videoid=<?php echo $video_id; ?>" method="POST">
	<textarea name="write_comment" rows="7" cols="60" ></textarea>

	<input type ="submit" name="post_comment" value="post comment">
	</form>		   
	</div>	   
			

		<?php
		

		
		
		
		$select_comment =mysql_query("SELECT * FROM comments where video_id='$video_id' ORDER BY id DESC");
		
		if(mysql_num_rows($select_comment)!=0)
		
		{
			
			
			
			while($r=mysql_fetch_assoc($select_comment ))
			{    
			  $id=$r['id'];
			  $user_commented = $r['user_commented'];
			   $comment =$r['comment'];
			   $date_posted =$r['date_posted'];
			   
			   
			   
			   
			   ?>


			   
			   </div>
			   
			   
			   
			   

	<div style="float:left;width:700px;font-size:14px;margin:0px 0px 0px 0px;padding-left:190px;padding-top:60px">





	<div style="float:left ;width:100px;">




	<?php echo "<a href='#'>".$user_commented.'</a> said:<br/>' ;
	echo $date_posted ;

	?>

	</div>


	<div style="float:left ;width:100px;">

	<?php
	 echo $comment ;
	 
	 
	 ?>


	</div>
	<br/><br/><br/>
		 <hr width="90%"/>
	</div>

	<?php	
			}

			
		}
		
		
		}
}
else
	header("Location:index.php");

?>
