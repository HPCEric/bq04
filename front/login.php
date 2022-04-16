<h1>第一次購物</h1>
<a href="?do=reg">
    <img src="../icon/0413.jpg" alt="">
</a>

<h1>會員登入</h1>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo $a . "+" . $b . "=";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確認</button>
</div>

<script>
    function login(){
        $.post("api/chk_ans.php",{
            ans:$("#ans").val()
        },(chk)=>{
            if(parseInt(chk)==1){
                $.post('api/chk_pw.php',{
                    acc:$('#acc').val(),
                    pw:$('#pw').val(),
                    table:'member'
                },(res)=>{
                    if(parseInt(res)==1){
                        location.href='index.php';
                    }else{
                        alert('acc or password is not correct');
                    }
                })
            }else{
                alert("sorry,ans is wrong")
            }
        })
    }
</script>