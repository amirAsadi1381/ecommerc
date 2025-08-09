
<?php
// include("model/modelProduct.php");
// $connection = factory::factory("modelFooter");
$id = $_POST['id'];
modelFooter::delete()::where('id',$id)::getsql();
// $connection->delete($id);