<h1 class="ct">商品分類</h1>

<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="parent" id="parent"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Type->all(['parent' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr class="tt">
            <td><?= $big['name']; ?></td>
            <td class="ct">
                <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
                <button onclick="del('type',<?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        $mids = $Type->all(['parent' => $big['id']]);
        if (!empty($mids)) {
            foreach ($mids as $mid) {
        ?>
                <tr class="pp ct">
                    <td><?= $mid['name']; ?></td>
                    <td>
                        <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
                        <button onclick="del('type',<?= $mid['id']; ?>)">刪除</button>
                    </td>
                </tr>
    <?php
            }
        }
    }
    ?>
</table>

<script>
    $("#parent").load("api/load_type.php")

    function addType(type) {
        let name, parent
        switch (type) {
            case 'big':
                name = $("#big").val();
                parent = 0;
                break;
            case 'mid':
                name = $("#mid").val();
                parent = $("#parent").val();
                break;
        }
        $.post("api/save_type.php", {
            name,
            parent
        }, () => {
            location.reload();
        })

    }

    function edit(dom, id) {
        let name = prompt('請輸入修改的分類文字', $(dom).parent().prev().text())
        $.post("api/save_type.php",{id,name},()=>{
            location.reload();
            // $(dom).parent().prev().text(name)
            //找到父類>前一個td>td內的文字內容
        })
    }
</script>