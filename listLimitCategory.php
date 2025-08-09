<?php
$limit = $_POST['from'];
$offset = $_POST['to'];
$y = modelCategory::limit($limit,$offset)->getsql();
for($i = 0;$i<$y->num_rows;$i++){
    $category = $y->fetch_assoc();
    
?>
    <div style = "width:900;height:70px;background-color:black;">
            <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['id'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['title'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;text-align:center;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $category['description'];?></div>
    </div>
<?php
}