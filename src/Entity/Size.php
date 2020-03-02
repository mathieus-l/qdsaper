<?php

namespace App\Entity;

/**
 * Description of Size
 *
 * @author mateusz
 */
class Size {
    public function setArray(array $size)
    {
        $_SESSION['size'] = $size;
        if ($size == [8,8]) {
            $_SESSION['sizename'] = 'little';
        }
        if ($size == [16,16]) {
            $_SESSION['sizename'] = 'medium';
        }
        if ($size == [32,16]) {
            $_SESSION['sizename'] = 'large';
        }
                
    }
    public function setName(string $sizename)
    {
        $_SESSION['sizename'] = $sizename;
        if ($sizename == 'little')
        {
            $_SESSION['size'] = [8,8];
        }
        if ($sizename == 'medium')
        {
            $_SESSION['size'] = [16,16];
        }
        if ($sizename == 'large')
        {
            $_SESSION['size'] = [32,16];
        }
    }
    
    
    
    public function getName() : string
    {
        if (isset($_SESSION['sizename'])) {
            return $_SESSION['sizename'];
        } else {
            return 'little';
        }
    }
    public function getArray() : array
    {
        if (isset($_SESSION['size'])) {
            return $_SESSION['size'];
        } else {
            return [8,8];
        }
    }
}
