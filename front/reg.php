<h1 class="ct">會員註冊</h1>

<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name">
        </td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkAcc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel">
        </td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp">
            <input type="text" name="addr" id="addr">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>|
    <button>重置</button>
</div>

<script>
    function chkAcc(){
        $.post("api/chk_acc.php",{acc:$("#acc").val()},(chk)=>{
            if(parseInt(chk)==1){
                alert("acc existed")
            }else{
                alert("acc is available")
            }
        })
    }

    function reg(){
        $.post("api/chk_acc.php",{acc:$("#acc").val()},(chk)=>{
            if(parseInt(chk)==1){
                alert("acc existed , try again")
            }else{
                $.post("api/reg.php",
                {
                acc:$("#acc").val(),
                pw:$("#pw").val(),
                name:$("#name").val(),
                tel:$("#tel").val(),
                addr:$("#addr").val(),
                email:$("#email").val()
                },(res)=>{
                    alert("welcome")
                    location.href="?do=login"
                })
            }
        })
    }
</script>