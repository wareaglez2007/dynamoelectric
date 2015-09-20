<?php

/* Date: 09/12/2015
 * Author: Rostom Sahakian
 * Calls the class page_loader it will load HTML on all pages
 */

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);



include '/private/functions/page_loader.php';

$head = new page_loader();
//<--09/12/2015--This for the navigation links make the array in the same format
$links =array(
    array("title"=>"Home","link"=>"index.php?page=home&title=Home"),
    array("title"=>"About this app","link"=>"index.php?page=about&title=About this app"),
    array("title"=>"paint","link"=>"index.php?page=paint&title=paint"),
    

    


    
);

    $java_script =array("bootstrap.min.js"); //<-09/13/2015--HERE WHERE YOU CAN ADD THE JAVA SCRIPT FILE NAME. MAKE SURE TO ADD THE FILE UNDER assests/js

    $web_pages= array();
    $css = array("bootstrap.min.css","font-awesome.min.css");
    $external_script =array("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
    $cities = array();
//$title, array $js, array $css, $body, array $links, array $cities, array $web_pages
///ECHOS all the pages when called 
echo $head->html_loader($_GET['title'], $java_script,$css, $external_script, $links, $_GET['page'],  $cities );