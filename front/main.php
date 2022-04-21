<?php
$id = $_GET['type'] ?? 0;

if ($id == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $type = $Type->find($id);
    if ($type['parent'] == 0) {
        $nav = $type['name'];
        $goods = $Goods->all(['big' => $id, 'sh' => 1]);
    } else {
        $big = $Type->find($type['parent']);
        $nav = $big['name'] . ">" . $type['name'];
        $goods = $Goods->all(['mid' => $id, 'sh' => 1]);
    }
}
?>

<h1><?= $nav; ?></h1>
<?php
foreach ($goods as $good) {
?>
    <div class="all" style="display:flex;height:200px;">
        <div class="pp" style="width:40%">
            <a href='?do=detail&id=<?= $good['id']; ?>' style="display:flex;height:100%;justify-content:center;align-items:center">
                <img src="img/<?= $good['img']; ?>" style="width:80%;height:80%">
            </a>
        </div>

        <div class="pp" style="width:60%">
            <div class="tt ct">
                <?= $good['name']; ?>
            </div>

            <div>
                價錢:<?= $good['price']; ?>
                <a href='?do=buycart&id=<?= $good['id']; ?>&qt=1' style="float:right">
                    <img src="icon/0402.jpg">
                </a>
            </div>
            <div>規格:<?= $good['spec']; ?></div>
            <div>簡介:<?= mb_substr($good['intro'], 0, 20); ?>...</div>
        </div>
    </div>
<?php
}
?>