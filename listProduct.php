<h3>SORT🙂🙃</h3>
<!DOCTYPE html>
<head>
    </head>
    <body>
        <form action = "http://localhost/ecommerce/listProduct/page/1" method = "post">
            <select name = "field">
                <option value = 'description'>description</option> 
                <!-- <option value = 'family'>family</option>  -->
            </select>
            <select name = "sort">
                <option value = 'dosc'> DOSC</option>
        <option value = 'asc'> ASC </option>
    </select>
    <button>ok</button>
</form>

<h3>SEARCH CAR🚘🚘</h3>

    <form action = "http://localhost/ecommerce/searchProduct/" method = "post">
    <select name = "serach">
        <option value = 'id'>id</option>
        <option value = 'name'>name</option>
        <option value = 'price '>price</option>
        <option value = 'description'>description</option>
        <option value = 'subQuery'>subQuery</option>
    </select>
    <select name = "sort">
<option value = 'dosc'> DOSC</option>
<option value = 'asc'> ASC </option>
</select>
    <input type = "text" name = "name"> 
    <button>search</button>
</form>

<h3>LIMIT⚽⚽</h3>

<form action = "http://localhost/ecommerce/listLimitProduct/page/1" method ="post"> 
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
        // modelProduct::select()->subquerycount(["category_title" => ["modelCategory" , "title"]])->get();
        // die();
        $produc = modelProduct::select()->with(["category_title" => ["modelCategory" , "title"]])->sort($sort,$field);
        // var_dump($produc);
        
        if(!is_array($produc)){
            
            for($i=0;$i<$produc->num_rows;$i++){
                $product[] = $produc->fetch_assoc();
            }
        }else{
            $product = $produc;
        }
        for($h = 0;$h<count($product);$h++){
            echo $product[$h]['description'];// نیاز به بررسی - دسترسی به ارایه با استفاده از کی ان
        }   
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
$pagenate = 10;
$offset = ($uri[4]-1)*$pagenate;
$limit = $offset + $pagenate;
// var_dump($product);
// die(   );
    for($r = $offset;$r<$limit;$r++){
       
        if(count($product) > $r){
        ?>
    <div style = "width:1300;height:70px;background-color:black;">
        
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$r]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$r]['name'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$r]['price'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$r]['description'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$r]['subQuery'];?></div>
        
        <a href = "http://localhost/ecommerce/deleteProduct/<?= $product[$r]['id'];?>">DELETE</a>
        <a href = "http://localhost/ecommerce/editProduct/<?= $product[$r]['id'];?>">EDIT</a>
        <a href = "http://localhost/ecommerce/singleProduct/<?= $product[$r]['id'];?>">SHOW</a>
    </div>
    <?php    
        }    
}


?>
<?php
// $y2 = modelProduct::all();
for($b = 0;$b<count($product);$b++){
    if($b == 1){
        $y3 = modelProduct::first()->getsql();
        $y4 = $y3->fetch_assoc();
        ?>
            <div style = "width:1300;height:70px;background-color:black;">
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['id'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['name'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['price'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $y4['description'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $product[$b]['category_id'];?></div>
                <?php
    }
}
$resulte = count($product)/10;
for($i = 0;$i<$resulte;$i++){
        ?>
<a href= "http://localhost/ecommerce/listProduct/page/<?php echo $i + 1;?>/<?php echo $sort?>/<?php echo $field?>">
    <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $i+1; ?></div>
</a>
<?php
    }
}