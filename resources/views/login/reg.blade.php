<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='/js/jquery-3.3.1.min.js'></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Document</title>
</head>
<body>
    <form action="">
    <table>
        <tr>
            <td>账号</td>
            <td><input type="text" name='name' id='name'></td>
        </tr>
        <tr>
           <td>输入验证码</td>
           <td><input type="text" name='' ></td>
           <td><button>获取验证码</button></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name='pwd'></td>
        </tr>
        <tr>
            <td><input type="submit" value='注册'></td>
        </tr>
        </table>
    </form>
</body>
</html>
<script>
$(function(){
    $.ajaxSetup({     
        headers: 
        {         
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            } 
            });
     $('button').click(function(){
        var name = $('#name').val();
        if(name == ''){
            alert('邮箱不能为空');
            return false;
        }
        $.post(
                    'sendemail',
                    {name:name},
                    function(res){
                        if(res.code == 1){
                            alert(res.res);
                        }else{
                            alert(res.res);
                        }
                    },
                );
                return false;
    })
})

</script>