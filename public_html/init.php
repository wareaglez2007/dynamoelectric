<?php

/* Date: 09/12/2015
 * Author: Rostom Sahakian
 * Calls the class page_loader it will load HTML on all pages
 */

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);


//$_SERVER['DOCUMENT_ROOT']
include '/private/functions/page_loader.php';

$head = new page_loader();
//<--09/12/2015--This for the navigation links make the array in the same format
$links =array(
    array("title"=>"Home",
           "link"=>"page=home&title=Home"
        ),
    array("title"=>"About",
          "link"=>"page=about&title=About",
          "subLinks" =>array(
              
             array("title"=>"Reviews",
              "link" =>"page=reviews&title=reviews&parent=About"
            )
        )
    ),
  
    
    ///PORTFOLLIO
    array("title"=>"Portfollio",
          "link"=>"page=portfollio&title=Portfollio",
          "subLinks"=>array(
              
              array("title"=>"Residential",
                    "link"=>"page=residential&title=Residential&parent=Portfollio"                  
                  ),
              array("title"=>"Commercial",
                    "link"=>"page=commercial&title=commercial&parent=Portfollio" 
                  )
          )
        ////SERVICES
               
        ),
        array("title"=>"Services",
          "link"=>"page=services&title=Services",
          "subLinks"=>array(
              
                 array("title"=>"Services",
                       "link"=>"page=services&title=Services",
                      
                  ),
                 array("title"=>"Assured-Grounding-System",
                    "link"=>"page=services&title=Assured-Grounding-System&&parent=Services" 
                  ),
                 array("title"=>"Backup Emergency Generators",
                    "link"=>"page=beg&title=Backup Emergency Generators&parent=Services" 
                  ),
                 array("title"=>"Ceilling Fan installation",
                    "link"=>"page=cfi&title=Ceilling Fan installation&parent=Services" 
                  ),
                 array("title"=>"Commercial Wiring",
                    "link"=>"page=cw&title=Commercial Wiring&parent=Services" 
                  ),
                 array("title"=>"Light Installation",
                    "link"=>"page=li&title=Light Installation&parent=Services" 
                  ),
                 array("title"=>"New Electrical Circuits",
                    "link"=>"page=nec&title=New Electrical Circuits&parent=Services" 
                  ),
                 array("title"=>"Surge Protectors",
                    "link"=>"page=sp&title=Surge Protectors&parent=Services" 
                  ),
                 array("title"=>"Panel Upgrade",
                    "link"=>"page=pu&title=Panel Upgrade&parent=Services" 
                  ),
                 array("title"=>"Phone and Fax Line Wiring",
                    "link"=>"page=pflw&title=Phone & Fax Line Wiring&parent=Services" 
                  ),
                 array("title"=>"Smoke Detectors",
                    "link"=>"page=sd&title=Smoke Detectors&&parent=Services" 
                  ),
                 array("title"=>"House Rewiring",
                    "link"=>"page=hr&title=House Rewiring&parent=Services&&parent=Services" 
                  ),
                 array("title"=>"Internet & Data Services",
                    "link"=>"page=ids&title=Internet and Data Services&&parent=Services" 
                  ),
                 array("title"=>"Home Entertainment Systems*",
                       "link"=>"page=hes&title=Home Entertainment Systems*&&parent=Services" 
                  ),
                 array("title"=>"Security Systems*",
                    "link"=>"page=ss&title=Security Systems*&&parent=Services" 
                  ),
                 array("title"=>"TV Mount Installation",
                    "link"=>"page=tmi&title=TV Mount Installation&&parent=Services" 
                  ),
                 array("title"=>"Holiday Lighting",
                    "link"=>"page=hl&title=Holiday Lighting&&parent=Services" 
                  ),
                 array("title"=>"Outdoor Lighting",
                    "link"=>"page=ol&title=Outdoor Lighting&&parent=Services" 
                  ),
                 array("title"=>"EV Charging Stations",
                    "link"=>"page=ecs&title=EV Charging Stations&&parent=Services" 
                  ),
                 array("title"=>"Service Calls",
                    "link"=>"page=sc&title=Service Calls&&parent=Services" 
                )              
            )
        
        ),
        array("title"=>"Contact",
                 "link"=>"page=contact&title=Contact"
        ),
    
        array("title"=>"Job Opportunities",
                 "link"=>"page=jobs&title=Job Opportunities"
        ),
        
    


    
);

    $java_script =array(); //<-09/13/2015--HERE WHERE YOU CAN ADD THE JAVA SCRIPT FILE NAME. MAKE SURE TO ADD THE FILE UNDER assests/js

    $web_pages= array();
    $css = array("bootstrap.min.css","font-awesome.min.css");
    $external_script =array("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
    $cities = array("Beverly Hills","Burbank","Encino","Glendale");
//$title, array $js, array $css, $body, array $links, array $cities, array $web_pages
///ECHOS all the pages when called 
echo $head->html_loader($_GET['title'], $java_script,$css, $external_script, $links, $_GET['page'],  $cities );