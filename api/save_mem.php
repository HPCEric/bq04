<?php
include_once "../base.php";
$Member->save($_POST);
to("../back.php?do=mem");
?>