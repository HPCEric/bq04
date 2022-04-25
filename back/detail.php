<?php
$user = $Ord->find($_GET['id'])
?>

<h1 class="ct">
    訂單編號
    <span style="color:red">
        <?= $user['no']; ?>
    </span>
</h1>
<table class="all">
    <tr>
        <td class="tt ct">會員帳號</td>
        <td class="pp"><?= $user['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <?= $user['name']; ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <?= $user['email']; ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <?= $user['addr']; ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp">
            <?= $user['tel']; ?>
        </td>
    </tr>
</table>
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $cart=unserialize($user['goods']);
    foreach ($cart as $id => $qt) {
        $goods = $Goods->find($id);

    ?>
        <tr class="pp ct">
            <td><?= $goods['name']; ?></td>
            <td><?= $goods['no']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $goods['price']; ?></td>
            <td><?= $goods['price'] * $qt; ?></td>
        </tr>
    <?php
       
    }

    ?>

</table>
<div class="all tt ct">總價:<?= $user['total']; ?></div>
<div class="ct">
    <button onclick="location.href='?do=order'">返回</button>
</div>
