<?php
class factory{
    public static function factory($classname){
        return new $classname;
    }
}

