<?php
$connection = factory::factory("modelCategory");
$id = $GLOBALS['uriArray'][3];
$y = modelCategory::find('id',$id);
$category = $y->fetch_assoc();
?>
<div style="width:1400px;height:70px;margin-bottom:10px;">
    <div style = "width:1000px;height:70px;background-color:black;">
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['id'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['title'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['description'];?></div>
    </div>
</div>
<?php

