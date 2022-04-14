<?php
include_once "../base.php";


$chk=$Member->math('count','*',['acc'=>$_POST['acc']]);
if($chk>0){
    echo 1;
}else{
    echo 0;
}
?>