<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //前台首页
    public function index(Request $request)
    {
    	$data=\DB::table('crm_goods')->get();
    	// dd($data);
    	return view('index.index',['data'=>$data]);
    }
    //商品详情
    public function shopcontent($id)
    {
    	if($id){
            // echo 111;die;
            $data=\DB::table('crm_goods')->where('goods_id',$id)->first();
            // dd($data);
            // $logo=explode('|',rtrim($data->goods_logo,'|'));
            return view('index/shopcontent',compact('data'));
        }
    }
    //加入购物车
    public function gowuche(Request $request){
        // $data=request()->all();
        // dd($data);
        $goods_id=$request->goods_id;
        $goods_num=$request->goods_num;
        $goods_price=$request->goods_price;
        // dd($goods_price);
        // dd($goods_id);
        // dd($goods_num);
        //取session
        $session= $request->session()->all();
        // dd($session);
        $user_name=$session['user_name'];
        // dd($user_name);
        //判断是否登录
        if(empty($session)) {
           return [
                'msg' => '请先登录',
                'code' => 5
            ];
        }
        $whereinfo=[
               'goods_id'=>$goods_id,
               'goods_price'=>$goods_price,
                'user_name'=>$user_name,
        ];
        // dd($whereinfo);
        $res=\DB::table('crm_gowuche')->where($whereinfo)->insert([
            'goods_id'=>$goods_id,
            'goods_num'=>$goods_num,
            'goods_price'=>$goods_price,
            'user_name'=>$user_name,
        ]);
        if ($res) {
                   return[
                       'msg'=>'加入购车成功',
                       'code'=>6
                   ];
               }else{
                   return[
                       'msg'=>'加入购车失败',
                       'code'=>5
            ];
        }
        // dd($res);
        //查询到做累加
//             if($res){
// //检测库存
//                 $appt=$this->checkGoodsNum($goods_id,$res->goods_num,$goods_num);
//                 if($appt==true){
//                     $where=[
//                         'goods_num'=>$goods_num+$res->goods_num,
//                         'update_time'=>time()
//                     ];

//                     $attr=\DB::table('crm_gowuche')
//                         ->where($whereinfo)
//                         ->update($where);
//                     if($attr){
//                         return[
//                             'msg'=>'加入购车成功',
//                             'code'=>6
//                         ];
//                     }else{
//                         return[
//                             'msg'=>'加入购车失败',
//                             'code'=>5
//                         ];
//                     }
//                 }
//             }else{
//                 $where=[
//                   'goods_id'=>$goods_id,
//                     'user_name'=>$user_name,
//                     'goods_num'=>$goods_num,
//                     'create_time'=>time(),
//                     'update_time'=>time()
//                 ];
//                 $resss=\DB::table('crm_gowuche')->insert($where);
//                    if($resss){
//                        return[
//                            'msg'=>'加入购车成功',
//                            'code'=>6
//                        ];
//                    }else{
//                        return[
//                            'msg'=>'加入购车失败',
//                            'code'=>5
//                 ];
//             }
//         }     
    } 
    public function carlist(Request $request){

         //取session
        $session= $request->session()->all();
        $user_name=$session['user_name'];
        $where=[
            'user_name'=>$user_name,
        ];
        $res=\DB::table('crm_goods as g')
            ->join("crm_gowuche as c",'g.goods_id','=','c.goods_id')
            ->where($where)
            ->get();
            // dd($res);
        // $res=array_reverse($res,desc);
       $data=\DB::table('crm_gowuche')->where($where)->count();
        if($res){
            return view('index/shopcart',compact('res','data'));
        }

    }  

    public function xiaoji(){
        
    }
}
