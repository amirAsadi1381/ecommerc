<?php
// $connection = factory::factory("modelUser");
$id = $GLOBALS['uriArray'][3];
modelUser::delete()->where('id',$id)->getsql();
// $connection->delete($id);$query->select