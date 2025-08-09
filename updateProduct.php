<?php
$id = $_POST['id'];     
var_dump($_POST);
modelProduct::update($_POST)->where('id',$id)->getsql();
