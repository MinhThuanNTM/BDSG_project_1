<?php
include "function.php";
$product = connect("SELECT * FROM product");
$myJSON = json_encode($product);

echo $myJSON;
?>