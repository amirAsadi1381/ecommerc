<?php
$id = $GLOBALS['uriArray'][3];
$y = modelUser::find('id',$id);
$user = $y->fetch_assoc();
?>
<form action = "http://localhost/ecommerce/updateUser" method = "post">
<input type = "hidden" name = id value = <?= $user['id'];?>>
<input type = "text" name = name value = <?= $user['name'];?>>
<input type = "text" name = family value = <?= $user['family'];?>>
<input type = "text" name = phoneNumber value = <?= $user['phoneNumber'];?>>
<button>OK</button>
</form>