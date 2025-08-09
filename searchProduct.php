<?php
$fields = $_POST['serach'];
$input = $_POST['name'];
$sort = $_POST['sort'];
// var_dump($sort);/
modelProduct::$search='search';
$product = modelProduct::where($fields,$input)->with(["category_title" => ["modelCategory" , "title"]])->sort($sort,'description');
var_dump($product);
for($p = 0 ; $p < count($product) ; $p ++){

    // $title = modelCategory::find('id',$product[$p]['category']);
    // $categorytitle[] = $title->fetch_assoc();
    echo "🚓🚓";
    ?>
    <div style = "width:1300;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$p]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$p]['name'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$p]['price'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$p]['description'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$p]['subQuery'];?></div>
</div>        
<?php
    }