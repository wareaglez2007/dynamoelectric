<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class page_loader{
    
    
    public function head($title, array $js, array $css){
        
        $html_head="";
        ?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8"> 
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
          <title><?= $title ?></title>
   <?php
      foreach ($css as $css_file){
          echo '<link href="assets/css/'.$css_file.'" rel="stylesheet">';
        }
   
      foreach ($js as $jsfile){
        echo '<script src="assets/js/'.$jsfile.'"></script>';
        }
        
        return $html_head;   
    }
    public function body(){
        
    }
    public function footer(){
        
    }
    
    public function html_loader($title){
        
    }
    
    
    
    
    
}
