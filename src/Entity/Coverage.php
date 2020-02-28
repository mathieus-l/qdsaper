<?php declare(strict_types = 1);

namespace \App\Entity;
use App\Entity\Grid;
/**
 * Description of Grid
 *
 * @author mateusz
 */
class Coverage {
    public function __construct() {
    }
    public function setCoverage(int $x, int $y) :array
    {
        $result = array(array());
        for ($i=0;$i<$size[0];$i++) 
        {
            for ($j=0;$j<$size[1];$j++)
            {
               $result[$i][$j] = rand(0,1);
            }

        }
        return $result;
    }
    
    public function getCoverage($param)
    {
        return $_SESSION['grid'];
    }
}
