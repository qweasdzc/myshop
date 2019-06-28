<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $redis = new \Redis();
        // $redis->connect('127.0.0.1','6379');
        // $redis->incr('num');
        // $num = $redis->get('num');
        // echo $num."<br/>";

      $n=request()->n;
        $where=[];
        if($n){
            $where[]=['goods_name','like',"%$n%"];
        }
        
        $data=DB::table('crm_goods')->where($where)->paginate(2);
        return view('goods.list',['data'=>$data,'n'=>$n]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        // dd($data);
        $path = $request->file('goods_logo')->store('goods');
        $img=asset('storage'.'/'.$path);
        // echo asset('storage'.'/'.$path);
        // dd($path);
       $res=DB::table('crm_goods')->insert([
            'goods_name'=>$data['goods_name'],
            'goods_logo'=>$img,
            'goods_price'=>$data['goods_price'],
            'goods_num'=>$data['goods_num'],
            'create_time'=>time(),
        ]);
      if($res){
          return redirect('/goods/list');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data=request()->input('goods_id');
        // dump($data);exit;
        $res=DB::table('crm_goods')->where('goods_id',$data)->get();
        // dd($res);
        foreach($res as $v){
        }
        return view('goods.edit',['v'=>$v]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $data=request()->except(['_token']);
        // dump($data);exit;
        $path = $request->file('goods_logo')->store('goods');
        $img=asset('storage'.'/'.$path);
        $res=DB::table('crm_goods')->where('goods_id',$data['goods_id'])->update([
            'goods_name'=>$data['goods_name'],
            'goods_logo'=>$img,
            'goods_price'=>$data['goods_price'],
            'goods_num'=>$data['goods_num'],
            'create_time'=>time(),
        ]);
        if($res){
            return redirect('/goods/list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
         $goods_id = request()->goods_id;
        // dump($goods_id);exit;
        $res=Goods::destroy($goods_id);
        // dump($res);exit;
        if ($res) {
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}