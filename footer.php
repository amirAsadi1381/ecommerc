    <?php

    // $connection = factory::factory("modelFooter");
    $y = modelFooter::select(['nameDesigner','phoneNumber','description'])::getsql();
    $footer = $y->fetch_assoc();
    if($y->num_rows == 1){    
    ?>
    <div style = "width:1300;height:70px;background-color:black;margin-top:100px;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"> <?= $footer['nameDesigner'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"> <?= $footer['phoneNumber'];?></div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px"> <?= $footer['description'];?></div>
    </div>
    <?php
    }
    if($y ->num_rows == 0){
    ?>
    <div style = "width:1300;height:70px;background-color:black;">
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px">not found</div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px">not found</div>
        <div style = "width:140px;height:40px;background-color:gold;float:left;margin-top:10px;margin-buttom:10px;margin-left:10px;margin-right:10px">not found</div>
    </div>
    <?php
    }
?>
</div>
</body>
</html>