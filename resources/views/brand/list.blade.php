@extends('admin/admin')
@section('title','品牌列表')
@section('content') 
<table border="1">
	<tr>
		<td>b_id</td>
		<td>商品名称</td>
		<td>商品网址</td>
		<td>商品logo</td>
		<td>操作</td>
	</tr>
@foreach($data as $v)
	<tr>
		<td>{{$v->b_id}}</td>
		<td>{{$v->b_name}}</td>
		<td>{{$v->b_app}}</td>
		<td>{{$v->b_logo}}</td>
		<td>
			<a href="">修改</a>
			<a href="">删除</a>
		</td>
	</tr>
@endforeach
</table>
@endsection

