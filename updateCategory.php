<?php
$id = $GLOBALS['uriArray'][3];
modelCategory::update($_POST)->where('id',$id)->getsql();
