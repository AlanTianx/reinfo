<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->input();
        if($input){
            $vf_code = new \Code();
            if(strtoupper($input['vf_code'])!=$vf_code->get()){
                return back()->with('error','验证码错误');
            }
            if(User::Verify_pass($input['user_name'],$input['user_pass'])){
                return redirect(url('admin/index'));
            }else{
                return back()->with('error','用户名或密码错误');
            }
        }else{
            return view('admin.login');
        }
    }
    public function vf_code(){
        $vf_code = new \Code();
        return $vf_code->make();
    }
}
