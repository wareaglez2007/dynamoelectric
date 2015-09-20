<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class page_loader{
    
    
    
 
    /*
     * HEAD
     */
    public function head($title, array $js, array $css, array $scripts_external){
      
        $html_head="";
        ?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8"> 
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <?php
          $title =($title == NULL)?"Home":$title;
                

          ?>
          <title><?= $title ?></title>
   
   <?php
      foreach ($css as $css_file){
          echo '<link href="assets/css/'.$css_file.'" rel="stylesheet">';
        }
   
      foreach ($js as $jsfile){
        echo '<script src="assets/js/'.$jsfile.'"></script>';
        }
      foreach ($scripts_external as $script){
        echo '<script src="'.$script.'"></script>';
        }
        ?>
         </head>
         <body>  
     <?php     
        return $html_head;   
    }
    
    
        public function navigation(array $links){
        ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="nav">
                    <ul>
                       
                            <?php
                              foreach ($links as $link){
                                  ?>
                                   <li class=""><a href="<?= $link['link'] ?>"><?= $link['title'] ?></a></li>
                           <?php 
         
        }
                            
                            ?>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
         <?php    
      
   return;
        
    }
    

    public function find_files($dir){
    ///check the files in the given directory and return an array    
   $directory = $dir;
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
       
   return $scanned_directory;
    }
    /*
     * Body
     */

    public function body($body){
               //If it os coming from index.php or www.domain.com give the body value the home.php value 
        if(!isset($body)){
        $body = "pages/home.php";

        include $body;
      
       ///If variable is set check if the file exists in the pages directory if not show 404 error
        }else if(isset($body)){
            $body = $body.".php";
            $value= $this->find_files("pages/");
            $search = in_array($body, $value);
                if($search == true){
                    include "pages/".$body;
                }else{
                    include 'pages/404.php';
                }
        }
        return $body;
        
    }
    
    public function footer(array $cities){
        $footer ="";
        
        ?>
    <footer class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4">
                    <ul>
                    <?php 
                            foreach ($cities as $city){
                                
                           ?>
                        
                        <li><?= $city ?></li>
                        <?php
                                
                            }
                    
                    ?>
                    </ul>      
                </div>
                <div class="col-lg-4">
                    <?php
                    $web_pages= $this->find_files("pages/");
                    $exclude = array_diff($web_pages, array("404.php"));
                    sort($exclude);
                            foreach ($exclude as $web_page){
                                
                                
                                $page_link = basename($web_page, ".php");
                                   ?>
                        
                    <li><a href="index.php?page=<?= $page_link ?>&title=<?= strtoupper($page_link);?>"><?= $page_link?></a></li>

                        <?php
                                
                            }
                    
                    
                    ?>
                    
                </div>
                <div class="col-lg-4">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <span>Dynamoelectric All Rights Reserved <?php echo date("Y"); ?> &reg;</span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
          <?php
        return $footer;
    }
    
    public function html_loader($title, array $js, array $css, array $external_script, array $links, $body,  array $cities){
        
        $this->head($title, $js, $css, $external_script);
      
        $this->navigation($links);

        $this->body($body);
        
        
        $this->footer($cities);
    }
    
    
    
    
    
}
