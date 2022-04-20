<?php
include_once "../base.php";
$parent=$_POST['parent']??0;
$types=$Type->all(['parent'=>$parent]);

foreach($types as $type){
    echo "<option value='{$type['id']}'>";
    echo $type['name']; 
    echo "</option>";
}
