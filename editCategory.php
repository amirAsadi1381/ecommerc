<?php
// include("model/modelCategory.php");
// $connection = new modelCategory;
// $factory = new factory;
// $connection = factory::factory("modelCategory");
// include("header.php");
$id = $GLOBALS['uriArray'][3];
$y = modelCategory::find('id',$id);
$category = $y->fetch_assoc();
?>
<form action = "http://localhost/ecommerce/updateCategory/<?= $category['id'];?>" method = "post">
    <input type = "text" name = "title" value = <?= $category['title'];?>>
    <input type = "text" name = "description" value = <?= $category['description'];?>>
    <button>SEND</button>
</form>
<?php
// include("footer.php");