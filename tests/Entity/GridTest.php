<?php declare(strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Logic\Mines;
use App\Entity\Grid;
use App\Entity\Setting;

class GridTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectNumbersOfMines(): void
    {
        
        $mines = new Mines();
        $setting = new Setting();
        $grid = new Grid();
        $setting->setSizeArray([5,5]);
        $setting->setMineNumber(24);
        $mines->beginGrid();
        $count_mines = 0;
        for ($i = 0; $i < $setting->getSizeArray()[0]; $i++) 
        {
            for ($j = 0; $j < $setting->getSizeArray()[1]; $j++) 
            {
                $count_mines += $grid->getOneGrid($i, $j);
            }
        }
        $this->assertEquals(24, $count_mines);
    }

    /**
     * @test
     */
    public function isInvalidArgumentException(): void
    {
        $mines = new Mines();
        $setting = new Setting();
        $this->expectException ( \InvalidArgumentException :: class ) ; 
        $setting->setSizeArray([5,5]);
        $setting->setMineNumber(26);
        $mines->beginGrid();
    }
}
