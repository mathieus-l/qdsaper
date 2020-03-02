<?php

require_once("vendor/autoload.php");
ini_set('register_globals', true);
$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);
$size = [3,3];

session_start();

$main_grid = new App\Entity\Grid();

$size_setting = new App\Entity\Size();

    $coveredClass = new App\Entity\Coverage();

if (isset($_POST['size'])){
    $size_setting->setName($_POST['size']);
    $main_grid->beginGrid($size_setting->getArray());  
    $coveredClass->getToCover($main_grid);
   }
if (!isset($_SESSION['size'])) {
    $_SESSION['size'] = $size;
}
    $coveredClass->setUncovered($main_grid, 5, 3);
    $coveredClass->setUncovered($main_grid, 6, 3);
    $coveredClass->setUncovered($main_grid, 4, 3);
    $coveredClass->setUncovered($main_grid, 1, 3);
    echo $twig->render('grid.html.twig', 
        ['size' => $size_setting->getArray(), 
            'sizename' => $size_setting->getName(),
            'main_grid' => $coveredClass->getCoverage()]);
