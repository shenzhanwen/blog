<form>
<input type="text" name="name" value="{{$query['name']??''}}" placeholder="请输入姓名">
    <button>搜索</button>
</form>

<form action="">
<table border=1>
<link rel="stylesheet" href="{{asset('css/page.css')}}" type="text/css">
<script src='/js/jquery-3.3.1.min.js'></script>
<meta name="csrf-token" content="{{ csrf_token() }}"> 
    <tr>
        <td>姓名</td>
        <td>电话</td>
        <td>图片</td>
        <td>操作</td>
    </tr>
    @if($data)
    @foreach($data as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->tel}}</td>
        <td><img src="{{config('app.img_url')}}{{$v->img}}" width="100"></td>
        <td><a href="javascript:;" class='del' id="{{$v->id}}">删除</a>
            <a href="{{url('/brand/edit',['id'=>$v->id])}}">编辑</a>
        </td>
    </tr>
    @endforeach
    @endif
</table>
{{$data->appends($query)->links()}}
</form>
<script>
          $('.del').click(function(){
         var id = $(this).attr('id');
        $.ajaxSetup({    
             headers: 
             {         
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                 } 
                 });
        $.post(
        '/brand/del/'+id,
        '',
        function(msg){
            alert(msg.msg);
            window.location.reload();
        },'json');
    });
</script>
