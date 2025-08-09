<?php
class router{
    public $url;
    public $urlArray;
    public function __construct($url){
        $this->url = $url;
    }
    public function partUrl(){
        $addres = $this->urlArray = explode("/",$this->url);
        return $addres;
    }
}
