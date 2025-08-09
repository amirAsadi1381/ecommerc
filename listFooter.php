<?php
?>
<form action = "http://localhost/ecommerce/listLimitFooter/" method = "post"> 
<input type = "text" name = "from" placeholder="enter from ...">
<input type = "text" name = "to" placeholder="enter to ...">
<button>ok</button>
<?php
// $connection = factory::factory("modelFooter");
$y = modelFooter::pagenate()->getsql();
for($i=0;$i<$y->num_rows;$i++){
    $footer = $y->fetch_assoc();
?>

<!-- <div style="width:1000px;height:70px;margin-bottom:10px;"> -->
    
    <div style = "width:1300;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['id'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['nameDesigner'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['phoneNumber'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"><?= $footer['description'];?></div>
            <form action = "deleteFooter" method = "post">
                <input type = "hidden" name = id value = <?= $footer['id'];?>>
                <button style = "width:100px;height:40px;background-color:withe;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px">DELETE</button>
            </form>
            <form action = "editFooter" method = "post">
                <input type = "hidden" name = "id" value = <?= $footer['id'];?>>
                <button style = "width:100px;height:40px;background-color:withe;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px">UPDATE</button>
            </form>
            
            <form action = "formFooter" method = "post">
                <input type = "hidden" name = "id" value = "<?= $footer['id']?>">
</form>
    </div>


<?php        
}


$resulte = $y2->num_rows/10;
for($i = 0;$i<$resulte;$i++){
?>
<a href = "http://localhost/ecommerce/listProduct/page/<?php echo $i + 1;?>">
    <div style="float:left;width:30px;height:30px;border-radius:15px;background-color:gold;text-align:center;font-size:20px;margin-right:5px;margin-top:15px;"><?php echo $i+1; ?></div>
</a>
<?php
}





