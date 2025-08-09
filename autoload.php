<?php
class autoload{
    public function load(string $classname){
        if($classname == 'mainDB' ||$classname == 'modelFooter' ||$classname == 'modelProduct' ||$classname == 'modelCategory' ||$classname == 'modelUser' ||$classname == 'querybuilder'){
            $classname = 'model/' . $classname. '.php';
        include($classname);
        return;
        }
        // $addres = $classname . '.php';
        // if(file_exists($addres)){
        //     // $addres = 'model/'.$addres;
        // }
        $classname.='.php';
        include($classname);
    } 
}
$autoload = new autoload;
spl_autoload_register([$autoload,"load"]);
// $autoload->autoload("autoload");




// spl_autoload_register(){
//     $file = $autoload . ".php";
//     if(file_exists($file)){
//         include("$file");
//     }else{
//         echo "file not found";
//     }

// });


