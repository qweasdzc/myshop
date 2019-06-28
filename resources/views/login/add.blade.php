<form action="{{url('/do_register')}}" method="post">
	@csrf
	@if ($errors->any())
	 <div class="alert alert-danger">
	 <ul>
	 @foreach ($errors->all() as $error)
	 <li>{{ $error }}</li>
	 @endforeach
	 </ul>
	 </div>
	@endif
	<table border="1">
		<tr>
			<td>用户名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="注册">
				<a href="{{url('/login')}}">登录</a>
			</td>
		</tr>
	</table>
</form>