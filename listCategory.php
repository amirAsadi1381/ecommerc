<h3>SORT🙂🙃</h3>
<!DOCTYPE html>
<head>
    </head>
    <body>
        <form action = "http://localhost/ecommerce/listCategory/page/1" method = "post">
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

    <form action = "http://localhost/ecommerce/searchCategory/" method = "post">
    <select name = "serach">
        <option value = 'id'>id</option>
        <option value = 'title'>name</option>
        <option value = 'description'>description</option>
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
       $categor =  modelCategory::select()->subquerycount(["category_title" => ["modelProduct"]])->getsql();
    //    var_dump($categor);
    // die();
        // die();
        // $category = modelCategory::select()->with(["category_title" => ["modelCategory" , "title"]])->getsql();
if(!is_array($categor)){
    // echo "amir";
    for($i=0;$i<$categor->num_rows;$i++){
        $category[] = $categor->fetch_assoc();
    }
}else{
    $category[] = $categor;
}
// var_dump($category);
// $title = modelCategory::find('id',$category[$v]['category']);
// for($v = 0;$v < count($category);$v++){    
// $categorytitle[] = $title->fetch_assoc();

// }
// die();
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
$pagenate = 10;
$offset = ($uri[4]-1)*$pagenate;
$limit = $offset + $pagenate;
// var_dump($category);
// die(   );
    for($r = $offset;$r<$limit;$r++){
       
        if(count($category) > $r){
        ?>
    <div style = "width:1300;height:70px;background-color:black;">
        
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $category[$r]['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $category[$r]['title'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $category[$r]['description'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $category[$r]['count'];?></div>
        
        <a href = "http://localhost/ecommerce/deleteCategory/<?= $category[$r]['id'];?>">DELETE</a>
        <a href = "http://localhost/ecommerce/editCategory/<?= $category[$r]['id'];?>">EDIT</a>
        <a href = "http://localhost/ecommerce/singleCategory/<?= $category[$r]['id'];?>">SHOW</a>
    </div>
    <?php    
        }    
}


?>
<?php
// $y2 = modelCategory::all();
for($b = 0;$b<count($category);$b++){
    if($b == 1){
        $y3 = modelCategory::first()->getsql();
        $first = $y3->fetch_assoc();
        ?>
            <div style = "width:1300;height:70px;background-color:black;">
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $first['id'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $first['title'];?></div>
                <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px;"><?= $first['description'];?></div>
                <?php
    }
}
$resulte = count($category)/10;
for($i = 0;$i<$resulte;$i++){
        ?>
<a href= "http://localhost/ecommerce/listCategory/page/<?php echo $i + 1;?>/<?php echo $sort?>/<?php echo $field?>">
    <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $i+1; ?></div>
</a>
<?php
    }
}