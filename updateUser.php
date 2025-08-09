<?php
$id = $_POST['id'];
modelUser::update($_POST)->where('id',$id)->getsql();
