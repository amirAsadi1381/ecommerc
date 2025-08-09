<?php
$id = $GLOBALS['uriArray'][3];
$y = modelProduct::find('id',$id);
$category = modelCategory::all();
// var_dump($category);
$product = $y->fetch_assoc();
// var_dump($product);
?>
<form action = "http://localhost/ecommerce/updateProduct" method = "post">
    <input type = "hidden" name = 'id' value =  <?php echo $product['id'];?>>
    <input type = "text" name = 'name' value =  <?php echo $product['name'];?>>
    <input type = "text" name = 'price' value =  <?php echo $product['price'];?>>
    <input type = "text" name = 'description' value =  <?php echo $product['description'];?>>
    <select name="category_id">
        <?php for($i=0;$i<$category->num_rows;$i++){ $categorytitle = $category->fetch_assoc();
            // var_dump($categorytitle);
            ?>
            <option value = "<?= $categorytitle['id'];?>">
                <?= $categorytitle['title'];?>
            </option>
        <?php } ?>
    </select>
    <button>ok</button>
    </form>
<?php
