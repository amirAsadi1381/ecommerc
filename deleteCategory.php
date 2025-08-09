<?php
// include("model/modelCategory.php");
// $connection = new modelCategory;
$connection = factory::factory("modelCategory");
$id = $GLOBALS['uriArray'][3];
modelCategory::delete()::where('id',$id)::getsql();
// $connection->delete($id);