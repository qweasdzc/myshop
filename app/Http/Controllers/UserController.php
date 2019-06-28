<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n=request()->n;
        $where=[];
        if($n){
            $where[]=['name','like',"%$n%"];
        }
        
        $data=\DB::table('crm_status')->where($where)->paginate(2);
        return view('user.list',['data'=>$data,'n'=>$n]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->except(['_token']);
        // dd($data);
        $res=\DB::table('crm_status')->insert($data);
         // dd($res);
        if($res){
            return redirect('/user/list');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data=request()->input('id');
        // dump($data);exit;
        $res=\DB::table('crm_status')->where('id',$data)->get();
        // dd($res);
        foreach($res as $v){
        }
        return view('user.edit',['v'=>$v]);
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
        $res=\DB::table('crm_status')->where('id',$data['id'])->update($data);
        if($res){
            return redirect('/user/list');
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
        $data=request()->id;
        // dump($data);exit;
        $res=Users::destroy($data);
        // dump($res);exit;
        if ($res) {
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
}
