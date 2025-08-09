<?php
class loadfile{
    public function load($filename){
        $file = $filename . ".php";
        if(file_exists($file)){
            include($file);
        }else{
            echo "file not found " . $file;
        }
    }
}
