<?php
$row = $Goods->find($_GET['id']);
?>

<h1 class="ct">
    <?= $row['name']; ?>
</h1>
<div class="all" style="display:flex">
    <div class='pp' style="width:60%;display:flex;justify-content:center;align-items:center">
        <img src="img/<?= $row['img']; ?>" style="width:95%;height:95%">
    </div>
    <div class='pp' style="width:40%">
        <?php
        $big = $Type->find($row['big']);
        $mid = $Type->find($row['mid']);
        echo $big['name'] . ">" . $mid['name'];
        ?>
        <div>編號:<?= $row['no']; ?></div>
        <div>價錢:<?= $row['price']; ?></div>
        <div>詳細說明:<?= $row['intro']; ?></div>
        <div>庫存:<?= $row['stock']; ?></div>
    </div>
</div>
<div class="all ct tt">
    購買數量:
    <input type="number" name="qt" id="qt" value="1" style="width:30px">
    <img src="icon/0402.jpg" onclick="buy(<?= $row['id']; ?>)">
</div>

<script>
    function buy(id){
        let qt = $("#qt").val();
        location.href='?do=buycart&id=$id&qt=$qt';
    }
</script>