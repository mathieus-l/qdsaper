<?php declare(strict_types = 1);
 
namespace App\Logic;

use App\Entity\Grid;
use App\Entity\Setting;

/**
 * Description of Finish
 *
 * @author mateusz
 */
class End
{
    public function checkState(Grid $grid) :int
    {
        $setting = new Setting();
        $size = $setting->getSizeArray();
        $uncovered = 0;
        $mines = $setting->getMineNumber();
        $state = 0;
        for ($i = 0; $i<$size[0]; $i++) {
            for ($j =0; $j<$size[1]; $j++) {
                if ($grid->getUncovered($i, $j) == 9) {
                    
                    $state = -1; //failed
                }
            }
        }
        for ($i = 0; $i<$size[0]; $i++) {
            for ($j =0; $j<$size[1]; $j++) {
                if ($grid->getUncovered($i, $j) >= 0) {
                    $uncovered++;
                }
            }
        }
        if ($state == -1) {
            for ($i = 0; $i<$size[0]; $i++) {
                for ($j =0; $j<$size[1]; $j++) {
                    if ($grid->getOneGrid($i, $j) == 1) {
                        $grid->setUncovered($i, $j, 9);
                    }
                }
            }
            return -1;//failed
        }
        
        if ($uncovered == ($size[0] * $size[1] - $mines)) {
            return 1; //success
        }
        return 0;//continue
    }
}
