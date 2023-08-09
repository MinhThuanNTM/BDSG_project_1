<?php
include "function.php";
$user = connect("SELECT user.*, delivery_info.* FROM user INNER JOIN delivery_info ON user.user_id = delivery_info.user_id");
$myJSON = json_encode($user);

echo $myJSON;
?>

