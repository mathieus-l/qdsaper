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
    private function setUncovered(int $x, int $y, int $value)
    {
        
        $covered = $this->getCoverage();
        $covered[$x][$y] = $value;
        $_SESSION['covered'] = $covered;
    }
    public function uncoverQ(Grid $grid, int $x, int $y)
    {
        if ($x >=0 && 
                $y>=0 && 
                $x <$grid->getNumOfRows() && 
                $y <$grid->getNumOfColumns() &&
                $this->getUncovered($x, $y) < 0)
        {
            $covered = $this->getCoverage();
            if ($grid->getOneGrid($x, $y) == 1){
                $this->setUncovered($x, $y, 9);
            } else {
                $borders = $this->borderer($grid, $x, $y);
                $this->setUncovered($x, $y, $borders);
                if ($borders == 0) {
                    $this->uncoverQ($grid, $x-1, $y-1);
                    $this->uncoverQ($grid, $x-1, $y);
                    $this->uncoverQ($grid, $x-1, $y+1);
                    $this->uncoverQ($grid, $x, $y-1);
                    $this->uncoverQ($grid, $x, $y+1);
                    $this->uncoverQ($grid, $x+1, $y-1);
                    $this->uncoverQ($grid, $x+1, $y);
                    $this->uncoverQ($grid, $x+1, $y+1);
                }
            }
        }
    }
    private function borderer(Grid $grid, $x,$y)
    {
           $borderer = 0;
           
            $low_r = $x - 1;
            if ($low_r < 0) {
                $low_r = 0;
            }
            $low_c = $y - 1;
            if ($low_c < 0) {
                $low_c = 0;
            }
            $high_r = $x + 1;
            if ($high_r > $grid->getNumOfRows()-1) {
                $high_r = $x;
            }
            $high_c = $y + 1;
            if ($high_c > $grid->getNumOfColumns()-1) {
                $high_c = $y;
            }
           
            for ($i = $low_r; $i<=$high_r;$i++)
            {
                for ($j = $low_c; $j<=$high_c;$j++)
                {
                    if ($grid->getOneGrid($i, $j) == 1 ) {
                            $borderer++;
                    }
                }
            }        
            return $borderer;
    }

    private function getUncovered($x,$y)
    {
        $covered = $this->getCoverage();
        return $covered[$x][$y];
    }

        public function getCoverage()
    {
        return $_SESSION['covered'];
    }
}
