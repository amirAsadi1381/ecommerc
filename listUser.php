<h3>SORT🙂🙃</h3>
<!DOCTYPE html>
<head>
    </head>
    <body>
        <form action = "http://localhost/ecommerce/listUser/page/1" method = "post">
            <select name = "field">
                <option value = 'phoneNumber'>phoneNumber</option> 
                <option value = 'family'>family</option> 
            </select>
            <select name = "sort">
                
                <option value = 'dosc'>DOSC</option>
        <option value = 'asc'>ASC</option>
    </select>
    <button>ok</button>
</form>

<h3>SEARCH CAR🚘🚘</h3>

    <form action = "http://localhost/ecommerce/searchUser/" method = "post">
    <select name = "serach">
        <option value = 'id'>id</option>
        <option value = 'name'>name</option>
        <option value = 'family '>family</option>
        <option value = 'phoneNumber'>phoneNumber</option>
    </select>
    <select name = "sort">
<option value = 'dosc'>DOSC</option>
<option value = 'asc'>ASC</option>
</select>
    <input type = "text" name = "name"> 
    <button>search</button>
    </form>
        
    <h3>LIMIT⚽⚽</h3>

    <form action = "http://localhost/ecommerce/listLimitUser/page/1" method ="post"> 
    <input type = "text" name = "from" placeholder="enter from ...">
    <input type = "text" name = "to" placeholder="enter to ...">
    <button>ok</button>
</form>
</body>
</html>
<?php
$l = 0;
if($_POST){
    $l++;
$field = $_POST['field']; 
$sort = $_POST['sort'];
}
if(count($GLOBALS['uriArray']) > 5){
    echo "🚓🚓";
    $l++;
    $sort = $GLOBALS['uriArray'][5];
    $field = $GLOBALS['uriArray'][6];
}
if($l == 1){
    // modelUser::getobj();
    $y = modelUser::select()->sort($sort,$field);

    

if($y === 'mysqli_result'){   
    for($i=0;$i<$y->num_rows;$i++){
        $users = $y->fetch_assoc();
    }
}else{
    $users = $y;
}



$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
$pagenate = 10;
$offset = ($uri[4]-1)*$pagenate;
$limit = $offset + $pagenate;
// var_dump($users);
// die(   );
    for($r = $offset;$r<$limit;$r++){
       
        if(count($users) > $r){
        ?>
    <div style = "width:1300;height:70px;background-color:black;">
        
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$r]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$r]['name'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$r]['family'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $users[$r]['phoneNumber'];?></div>
        
        <a href = "http://localhost/ecommerce/deleteUser/<?= $users[$r]['id'];?>">DELETE</a>
        <a href = "http://localhost/ecommerce/editUser/<?= $users[$r]['id'];?>">EDIT</a>
        <a href = "http://localhost/ecommerce/singleUser/<?= $users[$r]['id'];?>">SHOW</a>
    </div>
    <?php    
        }    
}


?>
<?php
$y2 = modelUser::all();
for($b = 0;$b<$y2->num_rows;$b++){
    if($b == 1){
        $y3 = modelUser::first()->getsql();
        $y4 = $y3->fetch_assoc();
        ?>
            <div style = "width:1300;height:70px;background-color:black;">
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['id'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['name'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['family'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['phoneNumber'];?></div>
                <?php
    }
}
$resulte = $y2->num_rows/10;
for($i = 0;$i<$resulte;$i++){
        ?>
<a href= "http://localhost/ecommerce/listUser/page/<?php echo $i + 1;?>/<?php echo $sort?>/<?php echo $field?>">
    <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $i+1; ?></div>
</a>
<?php
    }
}