<?php
$fields = $_POST['serach'];
$input = $_POST['name'];
// var_dump($input);
$sort = $_POST['sort'];
var_dump($sort);
$users = modelUser::select()->where($fields,$input)->sort($sort,'phoneNumber');
// var_dump($users);
// die();
for($p = 0 ; $p < count($users) ; $p ++){
    echo "🚓🚓";
    // if(count($users) > $p){
    ?>
    <div style = "width:1300;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$p]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$p]['name'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$p]['family'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$p]['phoneNumber'];?></div>
</div>        
<?php
    }
// }