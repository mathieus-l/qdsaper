<?php declare(strict_types = 1);

namespace App\Entity;
/**
 * Description of Grid
 *
 * @author mateusz
 */
class Grid {
    public function beginGrid(array $size, int $count_mines)
    {
        if ($size[0]*$size[1] < $count_mines) {
            throw new \InvalidArgumentException();
        }        
        $result = array(array());

        for ($i=0;$i<$size[0];$i++) 
        {
            for ($j=0;$j<$size[1];$j++)
            {
               $result[$i][$j] = 0;
            }
        }
        for ($i = 0; $i < $count_mines; $i++)
        {
            $result = $this->random_cell($result, $count_mines);
        }        
        $_SESSION['grid'] = $result;
    }
    private function random_cell(array $grid, $count_mines) : array
    {
            $x = rand(0,count($grid)-1);
            $y = rand(0,count($grid[0])-1);
            if ($grid[$x][$y] == 1) {
                $grid = $this->random_cell($grid, $count_mines - 1);
            } else {
                $grid[$x][$y] = 1;
//                print_r('mine ');
            }
        return $grid;
    }

    public function getGrid() : array
    {
        if (isset($_SESSION['grid'])) {
            return $_SESSION['grid'];
        } else {
           return $this->setGrid($size);
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

        return count($grid_);
    }
    public function getNumOfRows(): int
    {
        $grid_ = $this->getGrid();

        return count($grid_[0]);
    }
}
