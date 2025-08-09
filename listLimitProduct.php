<?php
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
if($_POST){
$limit = $_POST['from'];
$offset = $_POST['to'];
}else{
    $limit = $uri[5];
    $offset = $uri[6];
}
$y = modelProduct::limit($limit,$offset)->getsql();
for($i = 0;$i<$y->num_rows;$i++){
    $product[] = $y->fetch_assoc();
    $title = modelCategory::find('id',$product[$i]['category']);
    $categorytitle = $title->fetch_assoc();
}
    $resulte = modelProduct::sort($product,'asc','description');
    $u = $_SERVER['REQUEST_URI'];
    $uri = explode("/",$u);
    $pagenate = 10;
    $offseth = ($uri[4]-1)*$pagenate;
    $limitH = $offseth + $pagenate;    
    for($v = $offseth;$v<$limitH;$v++){
        if(count($resulte) > $v){
    ?>
    <div style = "width:1200px;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $resulte[$v]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;text-align:center;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $resulte[$v]['name'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $resulte[$v]['price'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $resulte[$v]['description'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $categorytitle['title'];?></div>
    </div>
    <?php
    }    
}
$resulte1 = count($resulte)/10;
for($a = 0;$a<$resulte1;$a++){
    ?>
    <a href = "http://localhost/ecommerce/listLimitProduct/page/<?php echo $a+1?>/<?php echo $limit?>/<?php echo $offset?>">
        <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $a+1; ?></div>
   <?php
}