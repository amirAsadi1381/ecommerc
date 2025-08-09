<?php
$y = modelCategory::select()::getsql();
?>
<form action = "getProduct" method = "post">
    <input type = "text" name = "name">
    <input type = "text" name = "price">
    <input type = "text" name = "description">
    <!-- <input type = "text" > -->
    <select name = "category">
        <?php
        for($i = 0;$i<$y->num_rows;$i++){ $valueCategory = $y -> fetch_assoc();
            ?>
            <option value="<?= $valueCategory['id'] ?>">
                <?= $valueCategory['title'] ?>
            </option>
        <?php } ?>
    </select>
    <button>send</button>
</form>
<?php


