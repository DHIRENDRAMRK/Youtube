<?php
session_start();

include ('includes/functions.php');
include ('includes/connect_to_mysql.php');
$user='';

if(isset($_SESSION['username']))
{
$user =$_SESSION['username'];	
	
}


//global $user ;
?>



<doctype html>
<html>
	<head>
	<title>Youtube ; <?php echo page_title('Share your videos with the world');?>  </title>
    <?php if ($browser == "Google Chrome" || $browser == "Apple Safari") {
	echo '
	<link rel="stylesheet" type="text/css" href="/series/videobox/css/sitestyle.css" />
    <link id="edu_menu" rel="stylesheet" type="text/css" href="/series/videobox/css/webkit/menu_black.css" />
	';
	}

   ?>
   
	</head>
<body>
<div class="menu_bg"></div>
	<div id="wrapper">          
    		<div id="menu">
            		<ul>
                      
	                <li class="menu_popular"><a href="popular.php">POPULAR VIDEOS</a></li>
                        <li class="menu_latest"><a href="latest_videos.php">LATEST VIDEOS</a></li>
                        <li class="menu_newmembers"><a href="latest_members.php">MEMBERS</a></li>
                        
                        <?php if($user=="")
						{
							echo ' 
						
					   <li class="menu_login"><a href="login.php">LOGIN</a></li>
                        <li class="menu_join"><a href="join.php">CREATE AN ACCOUNT</a></li>
	              '; }
				  else
				  {
				  
				  echo '<li class="menu_login"><a href="members.php">YOUR PROFILE</a></li> ';
				   echo '<li class="menu_login"><a href="logout.php">LOGOUT</a></li>';
				  
				  
				  }
				  ?>
				  </ul>
				  
                    <form action="search.php" id="search_form" method="post">
                     <?php if ($browser == "Google Chrome" || $browser == "Safari") {
	echo '
	<input type="text" name="search_box"  id="search_box"  value="" />
	';
	}
	
       ?>
    <input type="submit" name="search_button" id="search_button" value="" /> 
	
                        </form>
            </div>