<h1 class="ct">會員管理</h1>

<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>


    <?php
    $mems = $Member->all();
    foreach ($mems as $mem) {

    ?>

        <tr class="pp ct">
            <td><?= $mem['name']; ?></td>
            <td><?= $mem['acc']; ?></td>
            <td><?= $mem['regdate']; ?></td>
            <td>
                <button onclick="location.href='?do=edit_mem&id=<?=$mem['id'];?>'">修改</button>
                <button onclick="del('member',<?=$mem['id'];?>)">刪除</button>
                
            </td>

        </tr>
    <?php
    }
    ?>
</table>


<script>
    function del(table, id) {
        $.post('api/del.php', {
            table,
            id
        }, () => {
            location.reload()
        })
    }
</script>