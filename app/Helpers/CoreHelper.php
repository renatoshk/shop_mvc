<?php


namespace App\Helpers;


class CoreHelper
{
    //function to add slashes and remove other chars
    public function addSlashesAndRemoveDoubleQuotes($path){
        $path = addslashes($path);
        $path = str_replace('"', '', $path);
        return $path;
    }
}