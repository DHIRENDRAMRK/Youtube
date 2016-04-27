<?php

function getBrowser()
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    if(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
 
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,

    );
} 

// now try it
$ua=getBrowser();
$browser =  $ua['name'];







function page_title($page_title)

{
	return $page_title ;
	
	
	
}









?>