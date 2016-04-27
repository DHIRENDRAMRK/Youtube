<?php

include ('includes/header.php');


?>

<h2> Create Your Chanel </h2>

<form action='create_channel.php' method='POST'>
<input type='text' name='channel_name' size='40' maxlength='32' value='Give your channel a name' 

onclick='value=""' 
/>


<input type='submit' name='create_channel' value='Create channel'>


</form>