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
        for ($i = 0; $i<$size[0]; $i++) {
            for ($j =0; $j<$size[1]; $j++) {
                if ($grid->getUncovered($i, $j) == 9) {
                    return -1; //failed
                }
                if ($grid->getUncovered($i, $j) >= 0) {
                    $uncovered++;
                }
            }
        }
        if ($uncovered == ($size[0] * $size[1] - $mines)) {
            return 1; //success
        }
        return 0;//continue
    }
}
