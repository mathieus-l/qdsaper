<?php declare(strict_types = 1);

namespace App\Entity;

use App\Entity\Grid;
/**
 * Description of Grid
 *
 * @author mateusz
 */
class Coverage {
    public function __construct() {
    }
    public function getToCover(Grid $grid)
    {
        $i = 0;
        foreach ($grid->getGrid() as $grid_1d) 
        {
            $j = 0;
            foreach ($grid_1d as $grid_0d)
            {
               $covered[$i][$j] = -1;
               $j++;
            }
            $i++;
        }
        $_SESSION['covered'] = $covered;
    }
    public function setUncovered(Grid $grid, int $x, int $y)
    {
        
        $covered = $this->getCoverage();
        $i = 0;
        foreach ($grid->getGrid() as $grid_1d) 
        {
            $j = 0;
            foreach ($grid_1d as $grid_0d)
            {
               if ((($i == $x) && ($j == $y)) || ($covered[$i][$j] != -1)) {
                   $covered[$i][$j] = $grid_0d;
               }
               $j++;
            }
            $i++;
        }
        $_SESSION['covered'] = $covered;
    }
    
    public function getCoverage()
    {
        return $_SESSION['covered'];
    }
}
