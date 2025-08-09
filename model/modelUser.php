<?php
// include("mainDB.php");

class modelUser extends querybuilder{
    public $tablename = " user ";

    // public function create($user){
    //     $name = $user['name'];
    //     $family = $user['family'];
    //     $phoneNumber = $user['phoneNumber'];
    //     $this->connection->query("INSERT INTO {$this->tablename} (name,family,phoneNumber)VALUES('$name','$family','$phoneNumber')");   
    // }
    // public function update($user){
    //     $id = $user['id'];
    //     $name = $user['name'];
    //     $family = $user['family'];
    //     $phoneNumber = $user['phoneNumber'];
    //     $this->connection->query("UPDATE {$this->tablename} SET name = '$name',family = '$family',phoneNumber='$phoneNumber' WHERE id = $id");
    // }
}
