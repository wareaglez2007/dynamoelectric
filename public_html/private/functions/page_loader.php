<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class page_loader {

    public $_web_site_pages;
    public $_sub_links;
    public $_comp_info;

    /*
     * HEAD
     */

    public function head($title, array $js, array $css, array $scripts_external) {

        $html_head = "";
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8"> 
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <?php
                $title = ($title == NULL) ? "Home" : $title;
                ?>
                <title><?= $title ?></title>

        <?php
        foreach ($css as $css_file) {
            echo '<link href="assets/css/' . $css_file . '" rel="stylesheet">';
        }

        foreach ($js as $jsfile) {
            echo '<script src="assets/js/' . $jsfile . '"></script>';
        }
        foreach ($scripts_external as $script) {
            echo '<script src="' . $script . '"></script>';
        }
        ?>

                
                
                
                
                
                
                
                
                
            </head>
            <body role="document">  
        <?php
        return $html_head;
    }

    public function navigation(array $links) {

        $this->_web_site_pages = $links;
     
        ?>

                <!-- Static nav-bar -->
                        
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href=".">Dynamoelectric Inc.</a>
                     <a class="navbar-brand" href=""><i class="fa fa-facebook"></i></a>
                     <a class="navbar-brand" href=""><i class="fa fa-twitter"></i></a>
                     <a class="navbar-brand" href=""><i class="fa fa-yelp"></i></a>
   
                     
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
        <?php
        foreach ($links as $link) {
            //CHECK TO SEE IF THE ARRAY HAS SUB ARRAYS
            if (!array_key_exists("subLinks", $link)) {

                if ($link['title'] === $_GET['title'] && isset($_GET['title'])) {
                    $isActive = 'class="active"';
                } else if (!isset($_GET['title']) && $link['title'] === "Home") {
                    $isActive = 'class="active"';
                } else {
                    $isActive = '';
                }
                ?>
                 <li <?= $isActive ?>>

                  <a href="index.php?<?= $link['link'] ?>" title="<?= $link['title'] ?>" property="url" content="<?= $link['title'] ?>"><?= $link['title'] ?></a>

                 </li>

               <?php
                //If there link has sub array then do a dropdown menu
                   } else {
                   ?>
                     <li>
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $link['title']; ?><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                                          <?php
                         foreach ($link['subLinks'] as $link) {
                                                ?>

                             <li>    
                      <a href="index.php?<?= $link['link'] ?>" title="<?= $link['title'] ?>" property="url" content="<?= $link['title'] ?>" ><?= $link['title'] ?></a>
                             </li>
                <?php } ?>
                     </ul>
                     </li>                               
                                                    <?php
                                                }
                                            }
                                            ?>

                      
                     

                     
                                </ul>
                            </div>
                                </nav>
                     <div class="container"> 
                                <div class="row">
                                    <div class="col-lg-12">

                                        <ol class="breadcrumb">
                                            <li><a href=".">Home</a></li>
                                    <?php
                                 
                                  if(isset($_GET['parent'])){
                                      

                                   ?>
                                            
                                    <li><a href="index.php?<?= $_SERVER['HTTP_REFERER'] ?>"><?= $_GET['parent'] ?></a></li>        
                                <?php
                                  }
                                  if(isset($_GET['title'])){
                                      
                                      
                                      
                                    ?>
                                            <li class="active"><?= $_GET['title'] ?></li>      
                                 <?php           
                                      
                                  }
                                    
                                    ?>

                                            

                                        </ol>

                                    </div>
                                </div>  
                     </div>
        <?php
        return;
    }

    public function rteurn_pages() {
        return $this->_web_site_pages;
    }
    
    

  
      
    public function find_files($dir) {
        ///check the files in the given directory and return an array    
        $directory = $dir;
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));

        return $scanned_directory;
    }

    /*
     * Body
     */

    public function body($body) {
        //If it os coming from index.php or www.domain.com give the body value the home.php value 
        ?>
                <div class="container body_conainer">
        <?php        
        if (!isset($body)) {
            $body = "pages/home.php";

            include $body;

            ///If variable is set check if the file exists in the pages directory if not show 404 error
        } else if (isset($body)) {


            $body = $body . ".php";
            $value = $this->find_files("pages/");
            $search = in_array($body, $value);
            if ($search == true) {
                include "pages/" . $body;
            } else {
                include 'pages/404.php';
            }
        }
        ?>
                </div>         
        <?php
        return $body;
    }

    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    public function footer(array $cities, array $company_info) {
        $this->_comp_info = $company_info;
       
        $site_pages = $this->rteurn_pages();



        $footer = "";
        ?>
                     <footer class="footer">
                                <div class="container">
                                <div class="row ">
                                       
                                            <div class="col-xs-6 col-md-4 city">
                                                <h3>Service Areas</h3>   
                                                <ul>
                                <?php
                                
                                foreach ($cities as $city) {
                                    
                                    ?>

                                                    <li ><?= $city ?></li>
                                    <?php
                                }
                                ?>
                                                </ul>      
                                            </div>
                                        
                                            <div class="col-xs-6 col-md-4 pages">
                                                <h3>Pages</h3>
                                                <ul>
                                <?php
                                sort($site_pages);
                                foreach ($site_pages as $web_page) {

                                    if (!array_key_exists("subLinks", $web_page)) {
                                        ?>
                                  <li><a href="index.php?<?= strtolower($web_page['link']) ?>" title="<?= $web_page['title'] ?>"><?= $web_page['title'] ?></a></li>

                            <?php
                                   } else {
                                       sort($web_page['subLinks']);
                                foreach ($web_page['subLinks'] as $sublink) {
                                    ?>
                                  <li><a href="index.php?<?= strtolower($sublink['link']) ?>"><?= $sublink['title'] ?></a></li>

                            <?php } ?>

                            <?php
                                   }
                                        ?>



            <?php
        }
        ?>
                                                </ul>
                                            </div>
                                            <div class="col-xs-6 col-md-4 pages">
                                                
                                                <?php
                                                
                                                       
                                                
                                                ?>
                                                <h3>Our Company</h3>
                                                <ul>
                                                    <?php
                                                        
                                                           
                                                    $info =  $this->return_comp_info();    
                                                    
                                                    ?>
                                                    <li><h4>Email</h4></li>
                                                    <li><a href="mailto:<?=$info['email'] ?>"><?= $info["email"] ?></a></li>
                                                    <li><h4>Phone</h4></li>
                                                    <li><?= $info['phone'] ?></li>
                                                    <li><h4>Fax</h4></li>
                                                    <li><?= $info['Fax'] ?></li>
                                                    <li><h4>Company Address</h4></li>
                                                    <li><?= $info['Company Address'] ?></li>
                                                    <li>License <?= $info['license'] ?></li>
                                                    <li><?= $info['logo'] ?></li>
                                                        
                                                </ul>
                                            </div>
                                    
                                    
                                    
                                    
                                    
                                            
                                            
                                        
                                        </div>
                                </div>
                            </footer>
                                    
                    

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                            <script src="assets/js/owl.carousel.min.js"></script> 
                            <script src="assets/js/bootstrap.min.js"></script>   
                                                   <script>
 $(document).ready(function() {
 
  $("#main_carousel").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 1,
      itemsDesktop : [3000,3],
      itemsDesktopSmall : [3000,3]
 
  });
 
});

</script>   
                    </body>
                            </html>
                                                    <?php
                                                    return $footer;
                                                }

                                     
    public function return_comp_info(){
        
       foreach ($this->_comp_info as $k=> $info){
            
        }
    return $info;
     
    }               
 
                                                
                                                public function html_loader($title, array $js, array $css, array $external_script, array $links, $body, array $cities, array $comp_info) {

                                                    $this->head($title, $js, $css, $external_script);

                                                    $this->navigation($links);

                                                    $this->body($body);


                                                    $this->footer($cities , $comp_info);
                                                }

                                            }
                                            