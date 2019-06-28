<form action="{{url('/do_login')}}" method="post">
		@csrf
		
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
			<td><input type="submit" value="登录">
				<a href="{{url('/redister')}}">注册</a>
			</td>
		</tr>
	</table>
</form>