@extends('admin/admin')
@section('title','商品列表')
@section('content') 

<form>
    <input type="text" name="n" placeholder="请输入关键名称">
    <button>搜索</button>
</form>


<table border="1">
	  <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('css/page2.css')}}">
	<tr>
		<td>goods_id</td>
		<td>商品名称</td>
		<td>商品logo</td>
		<td>商品价格</td>
		<td>商品库存</td>
		<td>添加时间</td>
		<td>操作</td>
	</tr>
@foreach($data as $v)
	<tr>
		<td>{{$v->goods_id}}</td>
		<td>{{$v->goods_name}}</td>
		<td><img src="{{$v->goods_logo}}" class="img" alt="" width="100" ></td>
		<td>{{$v->goods_price}}</td>
		<td>{{$v->goods_num}}</td>
		<td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
		<td>
			<a href="edit?goods_id={{$v->goods_id}}">修改</a>
			<a href="javascript:void(0);" id="{{$v->goods_id}}" class="del">删除</a>
		</td>
	</tr>
@endforeach
</table>
{{ $data->appends(['n'=>$n])->links() }}
@endsection

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script>
  $('.del').click(function(){
    var goods_id=$(this).attr('id');

  $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
    });

    $.post(
      '/goods/del',
      {goods_id:goods_id},
      function(msg){
        alert(msg.msg);
        window.location.reload();
    },'json');
  });
</script>
