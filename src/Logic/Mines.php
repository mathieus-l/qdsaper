<?php declare(strict_types = 1);

namespace App\Logic;

use App\Entity\Setting;
use App\Entity\Grid;

use App\Logic\Coverage;

/**
 * Description of Mines
 *
 * @author mateusz
 */
class Mines
{
    public function beginGrid()
    {
        $setting = new Setting();
        $size = $setting->getSizeArray();
        $count_mines = $setting->getMineNumber();
        if ($size[0]*$size[1] < $count_mines) {
            throw new \InvalidArgumentException();
        }
        $result = array(array());
        for ($i = 0; $i < $size[0]; $i++) {
            for ($j = 0; $j<$size[1]; $j++) {
                $result[$i][$j] = 0;
            }
        }
        for ($i = 0; $i < $count_mines; $i++) {
            $result = $this->randomCell($result, $count_mines);
        }
        $coverage = new Coverage();
        $grid = new Grid();
        $grid->setGrid($result);
        $coverage->getToCover($grid);
        
    }
    private function randomCell(array $grid, $count_mines) : array
    {
        $x = rand(0, count($grid)-1);
        $y = rand(0, count($grid[0])-1);
        if ($grid[$x][$y] == 1) {
            $grid = $this->randomCell($grid, $count_mines - 1);
        } else {
            $grid[$x][$y] = 1;
        }
        return $grid;
    }
}
