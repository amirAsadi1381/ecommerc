<?php
$id = $GLOBALS['uriArray'][3];
$y = modelUser::find('id',$id);
$user = $y->fetch_assoc();
?>
<div style="width:1000px;height:70px;margin-bottom:10px;">
    <div style = "width:900;height:70px;background-color:black;">
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $user['id'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $user['name'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $user['family'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $user['phoneNumber'];?></div>
    </div>
</div>            
<?php
