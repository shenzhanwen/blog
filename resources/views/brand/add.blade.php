<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/brand/cate')}}" method='post' enctype="multipart/form-data">
    @csrf
    
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name='name'></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name='tel'></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="file" name='img' value='图片上传'></td>
            </tr>
           
            <tr>
                <td><input type="submit" value='提交'></td>
            </tr>
        </table>
    </form>
</body>
</html>