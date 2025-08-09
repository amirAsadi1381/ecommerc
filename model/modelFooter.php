<?php
class modelFooter extends querybuilder{
    public static $tablename = " footer ";

    // public function create($data){
    //     $nameDesigner = $data['nameDesigner'];
    //     $phoneNumber = $data['phoneNumber'];
    //     $description = $data['description'];
    //     $this->connection->query("INSERT INTO {$this->tablename} (nameDesigner,phoneNumber,description)VALUES('$nameDesigner','$phoneNumber','$description')");
    // }

    // public function update($data){
    //     $nameDesigner = $data['nameDesigner'];
    //     $phoneNumber = $data['phoneNumber'];
    //     $description = $data['description'];
    //     $this->connection->query("UPDATE {$this->tablename} SET nameDesigner='$nameDesigner',phoneNumber='$phoneNumber',description='$description'");
    // }

    // public function selectfooter(){
    //     $resulte = $this->select();
    //     return $resulte->num_rows;
    // }
    // public function createorupdate($data){
    //     $count = $this->selectfooter();
    //      if($count == 0){
    //         $this->create($data);
    //     }else{
    //         $this->update($data);        
    //      }       
    // }
    
}

// 
// $connection = new modelFooter;
