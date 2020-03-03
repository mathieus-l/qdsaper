<?php

namespace App\Entity;

/**
 * Description of Size
 *
 * @author mateusz
 */
class Setting {
    public function setSizeArray(array $size)
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
    public function setSizeName(string $sizename)
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
    
    
    
    public function getSizeName() : string
    {
        if (isset($_SESSION['sizename'])) {
            return $_SESSION['sizename'];
        } else {
            return 'little';
        }
    }
        
    public function getSizeArray() : array
    {
        if (isset($_SESSION['size'])) {
            return $_SESSION['size'];
        } else {
            return [8,8];
        }
    }
    public function getMineNumber() : int
    {
        if (isset($_SESSION['num_mines'])) {
            return $_SESSION['num_mines'];
        } else {
            return 1;
        }
    }
    public function setMineNumber(int $num_mines)
    {
        $_SESSION['num_mines'] = $num_mines;
    }
}
