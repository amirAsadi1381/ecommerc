
<?php
// include("model/modelProduct.php");
// $id = $_POST['id'];
$connection = factory::factory("modelProduct");
$id = $GLOBALS['uriArray'][3];
modelProduct::delete()::where('id',$id)::getsql();
// $connection->delete($id);