<form>
    <input type="text" name="n" placeholder="请输入关键名称">
    <button>搜索</button>
</form>
<table border="1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('css/page2.css')}}">
	<tr>
		<td>id</td>
		<td>学生姓名</td>
		<td>学生性别</td>
		<td>学生年龄</td>
		<td>操作</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->name}}</td>
		<td>{{$v->sex}}</td>
		<td>{{$v->ngx}}</td>
		<td>
			<a href="javascript:void(0);" id="{{$v->id}}" class="del">删除</a>
			<a href="edit?id={{$v->id}}">修改</a>
		</td>
	</tr>
	@endforeach
</table>
{{ $data->appends(['n'=>$n])->links() }}


<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script>
  $('.del').click(function(){
    var id=$(this).attr('id');

  $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });

    $.post(
      '/user/del',
      {id:id},
      function(msg){
        alert(msg.msg);
        window.location.reload();
    },'json');
  });
</script>