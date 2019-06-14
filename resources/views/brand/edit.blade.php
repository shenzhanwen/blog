<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/brand/update/'.$res->id)}}" method='post'>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name='name' value="{{$res->name}}"></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name='tel' value="{{$res->tel}}"></td>
            </tr>
            <tr>
                <td><input type="submit" value='修改'></td>
            </tr>
        </table>
    </form>
</body>
</html>