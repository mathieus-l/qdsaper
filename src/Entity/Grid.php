<?php declare(strict_types = 1);

namespace App\Entity;
/**
 * Description of Grid
 *
 * @author mateusz
 */
class Grid {
    public function beginGrid(array $size)
    {
        $result = array(array());
        for ($i=0;$i<$size[0];$i++) 
        {
            for ($j=0;$j<$size[1];$j++)
            {
               $result[$i][$j] = rand(0,1);
            }
        }
        $_SESSION['grid'] = $result;
    }
    
    public function getGrid() : array
    {
        if (isset($_SESSION['grid'])) {
            return $_SESSION['grid'];
        } else {
           return $this->setGrid($size);
        }
            
    }
}
