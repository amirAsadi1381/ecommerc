<?php
class mainDB{
    public static $instances = [];
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $DBname = "ecommerce";
    public $connection;
    public $tablename;
    public function __construct(){
        $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->DBname);
    }
    public static function createobj(){
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}



