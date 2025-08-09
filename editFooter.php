
<?php
// $connection = new modelUser;
// $connection = factory::factory("modelFooter");
// include("model/modelUser.php");
$id = $_POST['id'];
$y = modelFooter::find('id',$id);
$footer = $y->fetch_assoc();
?>
<form action = "updateFooter" method = "post">
<input type = "hidden" name = id value = <?= $footer['id'];?>>
<input type = "text" name = nameDesigner value = <?= $footer['nameDesigner'];?>>
<input type = "text" name = phoneNumber value = <?= $footer['phoneNumber'];?>>
<input type = "text" name = description value = <?= $footer['description'];?>>
<button>OK</button>
</form>
<?php

