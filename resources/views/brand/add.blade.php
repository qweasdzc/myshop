@extends('admin/admin')
@section('title','品牌添加')
@section('content') 
<form action="{{url('brand/doadd')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table border="1">
		<tr>
			<td>品牌名称</td>
			<td><input type="text" name="b_name"></td>
		</tr>
		<tr>
			<td>品牌网址</td>
			<td><input type="text" name="b_app"></td>
		</tr>
		<tr>
			<td>品牌logo</td>
			<td><input type="file" name="b_logo"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>
@endsection
