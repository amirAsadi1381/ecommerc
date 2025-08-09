<?php
$limit = $_POST['from'];
$offset = $_POST['to'];
$y = modelFooter::limit($limit,$offset)->getsql();
for($i = 0;$i<$y->bum_rows;$i++){
?>
    <div style = "width:1300;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['nameDesigner'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['phoneNumber'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['description'];?></div>
<?php
}