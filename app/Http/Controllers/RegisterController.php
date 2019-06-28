<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
    	return view('index.register');
    }
    public function do_zhuce(Request $request){
    	// echo 123;
    	$user_name=$request->user_name;
        $user_pwd=$request->user_pwd;
        $res=\DB::table('crm_user')->insert([
            'user_name'=>$user_name,
            'user_pwd'=>md5($user_pwd),
        ]);
      if($res){
          return redirect('logins');
      }
    }
    public function login(){
    	return view('index.login');
    }
    public function do_login(Request $request){
    	// echo 123;
    	$data=request()->all();
    	// dd($data);
    	// $user_name=$request->user_name;
    	// dd($user_name);
        // $user_pwd=$request->user_pwd;
        // dd($user_pwd);
        $where=[
            // 'user_id'=>$data['user_id'],
        	'user_name'=>$data['user_name'],
        	'user_pwd'=>md5($data['user_pwd']),
        ];
        // \DB::enableQueryLog();
        $res=\DB::table('crm_user')->where($where)->first();
        // print_r(\DB::getQueryLog());
        // dd($res);
        if (!empty($res)) {
            //发放权限，写入session
            session(['user_name'=>$data['user_name']]);
            // $re =$request->session()->put('name',$data['name']);
            return redirect('/');
        }else{
            echo '登录失败';
        }
    }
}
