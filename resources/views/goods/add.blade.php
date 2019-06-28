@extends('admin/admin')
@section('title','商品添加')
@section('content') 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<form action="{{url('goods/doadd')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table border="1">
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="goods_name"></td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td><input type="file" name="goods_logo"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="goods_price"></td>
		</tr>
		<tr>
			<td>库存</td>
			<td><input type="text" name="goods_num"></td>
		</tr>
		<tr>
			<td><input type="submit" value="添加"></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>
@endsection



