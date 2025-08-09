<?php
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
if($_POST){
    $limit = $_POST['from'];
    $offset = $_POST['to'];
}else{
    $limit = $uri[5];
    $offset = $uri[6];
    // var_dump($limit);
    // var_dump($offset);
}
$users = [];
$y = modelUser::limit($limit,$offset)->getsql();
for($a = 0;$a < $y->num_rows;$a++){
    $users[] = $y->fetch_assoc();
}
$count = count($users);
for($s = 0;$s<$count;$s++){
    $max = 0;
    foreach($users as $key){
        if($key['phoneNumber'] > $max){
            $max = $key['phoneNumber'];
        }
    }
    foreach($users as $key => $value){
        if($max == $value['phoneNumber']){
            $resulte[] = $value;
            unset($users[$key]);
        }
    }
}
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
$pagenate = 10;
$offsetH = ($uri[4]-1)*$pagenate;
$limitH = $offsetH + $pagenate;
for($l = $offsetH;$l<$limitH;$l++){
    if(count($resulte) > $l){
    ?>
            <div style = "width:1300;height:70px;background-color:black;">
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $resulte[$l]['id'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $resulte[$l]['name'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $resulte[$l]['family'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $resulte[$l]['phoneNumber'];?></div>
            </div>
            <?php
    }    
}
$count = count($resulte)/10;
for($z = 0;$z<$count;$z++){
        ?>
    <a href = "http://localhost/ecommerce/listLimitUser/page/<?php echo $z +1;?>/<?php echo $limit?>/<?php echo $offset?>">
        <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $z+1; ?></div>
        </a>
        <?php
}