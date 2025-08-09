<?php
$id =$_POST['id'];
modelFooter::update($_POST)->where('id',$id)->getsql();
