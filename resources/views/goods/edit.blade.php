<form action="{{url('goods/doupd')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table border="1">
		 <input type="hidden" name="goods_id" value="{{$v->goods_id}}">
		<tr>
			<td>商品名称</td>
			<td><input type="text" name="goods_name" value="{{$v->goods_name}}"></td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td><input type="file" name="goods_logo" value="{{$v->goods_logo}}"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="goods_price" value="{{$v->goods_price}}"></td>
		</tr>
		<tr>
			<td>库存</td>
			<td><input type="text" name="goods_num" value="{{$v->goods_num}}"></td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
			<td></td>
		</tr>
	</table>
</form>
