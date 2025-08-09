<?php
$id = $GLOBALS['uriArray'][3];
$y = modelProduct::find('id',$id);
$product = $y->fetch_assoc();
$b = modelCategory::find('id',$product['category']);
$product1 = $b->fetch_assoc();
?>

<div style="width:1400px;height:70px;margin-bottom:10px;">
    <div style = "width:1000px;height:70px;background-color:black;">
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $product['id'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $product['name'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $product['price'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $product['description'];?></div>
            <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $product1['title'];?></div>
    </div>
</div>
<?php
