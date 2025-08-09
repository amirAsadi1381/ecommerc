<?php

// include("mainDB.php");

class modelCategory extends querybuilder{
    public $tablename="category";
    public $relatedto = ['category' => ['product.category_id','category.id']];
    // public function create($user){
    //     $title = $user['title'];
    //     $description = $user['description'];
    //     $connection->query("INSERT INTO {$this->tablename} (title,description)VALUES('$title','$description')");   
    // }
    // public function update($user){
    //     $id = $user['id'];
    //     $title = $user['title'];
    //     $description = $user['description'];
    //     $connection->query("UPDATE {$this->tablename} SET title = '$title',description = '$description' WHERE id = $id");
    // }

    // public function delete($id){
    //     $connection->query("DELETE FROM {$this->tablename} WHERE id = $id");
    // }

    // public function find($id){
    //    return $connection->query("SELECT * FROM {$this->tablename} WHERE id = $id");
    // }
}

 


// class modelCategory extends mainDB{
//     public $tablename="category";
//     public function create($user){
//         $title = $user['title'];
//         $description = $user ['description'];
//         $this->connection->query("INSERT INTO {$this->tablename} (title,description)VALUES('$title','$description')");
//     }
//     public function update($user,$id){
//         $title = $user['title'];
//         $description = $user['description'];
//         $this->connection->query("UPDATE {$this->tablename} SET title = '$title',description='$description' WHERE id = $id ");
//     }
// }

// $connection = new querybuildercategory;
