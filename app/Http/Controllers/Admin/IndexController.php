<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function logout()
    {
        session(['user'=>null]);
        return redirect(route('a_login'))->with('error','成功退出');
    }

    public function upd_pass(Request $request)
    {
        $input = $request->input();
        if($input){
            if($input['password_o']!=Crypt::decrypt(session('user.us_pwd'))){
                return back()->with('errors','原始密码不正确');
            }else{
                //验证规则
                $rules = [
                    'password' => 'required|between:6,20',
                ];
                //规则信息反馈
                $message = [
                    'password.required' => '新密码不能为空',
                    'password.between' => '请注意：新密码必须在6～20位之间',
                ];
                //验证服务
                $validator = Validator::make($input, $rules, $message);
                if ($validator->passes())
                {
                    $user = User::where('us_id', session('user.us_id'))->first();
                    $user->us_pwd = Crypt::encrypt($input['password']);
                    if ($user->update())
                    {
                        session(['user' => null]);
                        return redirect(route('a_login'))->with('error','密码修改成功!请重新登录');
                    }
                } else
                {
                    return back()->withErrors($validator);
                }
            }
        }
        return view('admin.pass');
    }

}
