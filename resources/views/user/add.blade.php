<form action="{{url('user/doadd')}}" method="post">
	@csrf
	<table border="1">
		<tr>
			<td>学生姓名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>学生性别</td>
			<td><input type="text" name="sex"></td>
		</tr>
		<tr>
			<td>学生年龄</td>
			<td>
				<input type="radio" name="ngx" value="男" checked>男
				<input type="radio" name="ngx" value="女">女
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="登录"></td>
		</tr>
	</table>
</form>
