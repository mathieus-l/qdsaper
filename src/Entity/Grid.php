<?php declare(strict_types = 1);

namespace App\Entity;
/**
 * Description of Grid
 *
 * @author mateusz
 */
class Grid {

    public function getGrid() : array
    {
        if (isset($_SESSION['grid'])) {
            return $_SESSION['grid'];
        } else {
           return [];
        }
            
    }
    public function getOneGrid(int $x, int $y) : int
    {
        $grid_ = $this->getGrid();
        return $grid_[$x][$y];
    }
    public function getNumOfColumns(): int
    {
        $grid_ = $this->getGrid();

        return count($grid_[0]);
    }
    public function getNumOfRows(): int
    {
        $grid_ = $this->getGrid();

        return count($grid_);
    }
    public function getUncovered(int $x,int $y) : int
    {
        $covered = $this->getCoverage();
        return $covered[$x][$y];
    }

    public function getCoverage() :array
    {
        return $_SESSION['covered'];
    }
    public function setUncovered(int $x, int $y, int $value)
    {
        
        $covered = $this->getCoverage();
        $covered[$x][$y] = $value;
        $_SESSION['covered'] = $covered;
    }

}
