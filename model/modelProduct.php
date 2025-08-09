<?php
// include("mainDB.php");

class modelProduct extends querybuilder{
    public $tablename="product";
    public $relatedto = ['category' => ['product.category_id','category.id']];
    // public function create($user){
    //     $name = $user['name'];
    //     $price = $user['price'];
    //     $description = $user['description'];
    //     $category = $user['category'];
    //     $this->connection->query("INSERT INTO {$this->tablename} (name,price,description,category)VALUES('$name','$price','$description','$category')");   
    // }
    // public function update($user){
    //     $id = $user['id'];
    //     $name = $user['name'];
    //     $price = $user['price'];
    //     $description = $user['description'];
    //     $category = $user['category'];
    //     $this->connection->query("UPDATE {$this->tablename} SET name = '$name',price = '$price',description = '$description',category='$category' WHERE id = $id");
    // }
    
    // public function getcategorytitle($id){
    //     $p = $this->connection->query("SELECT title FROM category WHERE id = $id");       
    //     return $p->fetch_assoc();
    // }

    // public function gettitle(){
    //     return $this->connection->query("SELECT id , title FROM category");       
    // }
}

//     public function delete($id){
//         $this->connection->query("DELETE FROM {$this->tablename} WHERE id = $id");
//     }
//     public function find($id){
//        return $connection->query("SELECT * FROM {$this->tablename} WHERE id = $id");
//     }



// class modelProduct extends mainDB{
//     public $tablename="product";
    
//     public function create($user){
//         $name = $user['name'];
//         $price = $user['price'];
//         $description = $user['description'];
//         $category = $user['category'];
//         $this->connection->query("INSERT INTO {$this->tablename} (name,price,description,category)VALUES('$name','$price','$description','$category')");
//     }
//     public function update($user){
//         // var_dump($user);
//         $id = $user['id'];
//         $name = $user['name'];
//         $price = $user['price'];
//         $description = $user['description'];
//         $category = $user['category'];
//         $this->connection->query("UPDATE {$this->tablename} SET name = '$name',price = '$price',category='$category',description='$description' WHERE id = $id ");
//     }
    

// }

// $connection = new modelProduct;