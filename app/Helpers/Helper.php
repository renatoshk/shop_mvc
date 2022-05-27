<?php


namespace App\Helpers;


class Helper
{
    public function checkCurrentAndNextValues($next, $current, $field){
        if($next[$field] !== $current[$field]){
            return true;
        }
        return false;
    }
    //redirect function
    public function redirect($location){
        header('Location: ' . URLROOT . '/' . $location);
    }

}