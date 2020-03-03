<?php declare(strict_types=1);

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use \App\Entity\Grid;

class GridTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectNumbersOfMines(): void
    {
        
        $grid = new Grid();
        $size[0] = 5;
        $size[1] = 5;
        $grid->beginGrid($size, 24);
        $count_mines = 0;
        for ($i = 0; $i < $size[0]; $i++) 
        {
            for ($j = 0; $j < $size[1]; $j++) 
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
        $grid = new Grid();
        $this->expectException ( \InvalidArgumentException :: class ) ; 
        $size[0] = 5;
        $size[1] = 5;
        $grid->beginGrid($size, 27);
    }
}
