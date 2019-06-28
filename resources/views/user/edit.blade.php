<form action="{{url('user/doupd')}}" method="post">

	@csrf
	<table border="1">
		 <input type="hidden" name="id" value="{{$v->id}}">
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name" value="{{$v->name}}"></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td><input type="text" name="sex" value="{{$v->sex}}"></td>
		</tr>
		<tr>
			<td>学生年龄</td>
			<td>
				<input type="radio" name="ngx" @if($v->ngx =='男') checked @endif value="男">男
				<input type="radio" name="ngx" @if($v->ngx =='女') checked @endif value="女">女
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="登录"></td>
		</tr>
	</table>
</form>
