<?php
include_once "../base.php";

$db = new DB($_POST['table']);
$chk = $db->math('count', '*', ['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
if ($chk > 0) {
    echo 1;
    switch ($_POST['table']) {
        case 'member':
            $_SESSION['member'] = $_POST['acc'];
            break;

        case 'admin':
            $_SESSION['admin'] = $_POST['acc'];
            $admin=$Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
            $_SESSION['pr']=unserialize($admin['pr']);
            break;
    }
} else {
    echo 0;
}
