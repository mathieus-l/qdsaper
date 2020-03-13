<?php

require_once("vendor/autoload.php");
ini_set('register_globals', true);
$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);
$size = [3,3];

session_start();

$grid = new App\Entity\Grid();
$setting = new App\Entity\Setting();

$begin = new App\Logic\Begin();
$coverage = new App\Logic\Coverage();

$end = new \App\Logic\End();

if (isset($_POST['size'])){
    $setting->setSizeName($_POST['size']);
    $setting->setMineNumber(8);
    $begin->beginGrid();  
    $coverage->getToCover($grid);
   }
if (isset($_POST['uncover']))
{
    $position = explode('-',$_POST['uncover']);
    $coverage->uncoverQ($grid, $position[0], $position[1]);
}
if (!isset($_SESSION['size'])) {
    $_SESSION['size'] = $size;
}
    echo $twig->render('grid.html.twig', 
        ['size' => $setting->getSizeArray(), 
            'sizename' => $setting->getSizeName(),
            'state' => $end->checkState($grid),
            'main_grid' => $grid->getCoverage()]);
