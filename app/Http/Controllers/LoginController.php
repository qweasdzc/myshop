<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
class LoginController extends Controller
{
    public function login(){
    	return view('login.login');
    }

    public function do_login(Request $request){
    	// echo 123;
    	$data=$request->all();
        // dd($data);
        $info=Login::where(['name'=>$data['name'],'password'=>$data['password']])->first();
        // dd($info);
        // $login=$info->toArray();
        if (!empty($info)) {
            //发放权限，写入session
            session(['name'=>$data['name']]);
            // $re =$request->session()->put('name',$data['name']);
            return redirect('admin');
        }else{
            echo '登录失败';
        }
    	
    }

    public function logout(Request $request){
        $request->session()->flush();
    	return redirect('/');
    }

    public function redister(){
        return view('login.add');
    }

    public function do_register(Request $request){
        $data=$request->except(['_token']);
        // dd($data);
        
        $validator = \Validator::make($request->all(), [
                'name' => 'required|unique:crm_login|max:10',
                'password' => 'required',
            ],[
                'name.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                ]);
            if ($validator->fails()) {
            return redirect('/redister')->withErrors($validator)->withInput();
            }
        $res=\DB::table('crm_login')->insert($data);
         // dd($res);
        if($res){
            return redirect('/login');
        }
    }
    
}
