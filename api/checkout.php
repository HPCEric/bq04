<?php
include_once "../base.php";


$_POST['no'] = date("Ymd") . rand(10000, 99999);
$_POST['goods'] = serialize($_SESSION['cart']);

$Ord->save($_POST);

unset($_SESSION['cart']);
?>