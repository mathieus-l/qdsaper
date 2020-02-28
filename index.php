<?php

require_once("vendor/autoload.php");

$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);
$size = [3,3];

$main_grid = array(array(array()));

function grid_generate($size) {
    
}
if (isset($_POST['size'])){
    if ($_POST['size'] == 'little') {$size = [8,8];}
    if ($_POST['size'] == 'medium') {$size = [16,16];}
    if ($_POST['size'] == 'large') {$size = [16,32];}
      
    }

echo $twig->render('grid.html.twig', 
        ['size' => $size, 
            'main_grid' => $main_grid]);
