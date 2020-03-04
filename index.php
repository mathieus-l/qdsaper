<?php

require_once("vendor/autoload.php");
ini_set('register_globals', true);
$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);
$size = [3,3];

session_start();

$grid = new App\Entity\Grid();
$setting = new App\Entity\Setting();

$play = new App\Logic\Play();
$coverage = new App\Logic\Coverage();

$state = new \App\Logic\State();

if (isset($_POST['size'])){
    $setting->setSizeName($_POST['size']);
    $setting->setMineNumber(5);
    $play->beginGrid();  
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
            'main_grid' => $grid->getCoverage(),
            'state' => $state->checkState($grid)]);
