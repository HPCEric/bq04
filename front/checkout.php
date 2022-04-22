<?php
$user = $Member->find(['acc' => $_SESSION['member']])
?>

<h1 class="ct">填寫資料</h1>
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$user['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?=$user['name'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email" value="<?=$user['email'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <input type="text" name="addr" id="addr" value="<?=$user['addr'];?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel" value="<?=$user['tel'];?>">
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
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
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
        $sum += ($goods['price'] * $qt);
    }

    ?>

</table>
<div class="all tt ct" id="sum" data-sum="<?=$sum;?>">總價:<?=$sum;?></div>
<div class="ct">
    <button onclick="buy()">確認送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
    function buy(){
        let data={
            acc:'<?=$user['acc'];?>',
            name:$("#name").val(),
            addr:$("#addr").val(),
            email:$("#email").val(),
            tel:$("#tel").val(),
            total:<?=$sum;?>
        }

        $.post("api/checkout.php",data,()=>{
            // console.log(res)
            alert("thank you!")
            location.href="index.php"
        })
    }
</script>