<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Web\Joinus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JoinController extends Controller
{
    public function index()
    {
        if (!Auth::User()) {
            return redirect(route('login'));
        }
        if( $info = Joinus::where('users_id',Auth::User()->id)->first()) {
            return view('joinus', compact('info'));
        }
        return view('joinus');
    }

    public function add(Request $request)
    {
        $input = $request->except('_token');
        if($input) {
            $vf_code = new \Code();
            if(strtoupper($input['vf_code'])!=$vf_code->get()) {
                return back()->with('errors', '验证码错误');
            } else {
                $rules = [
                    'name' => 'required',
                    'tel' => 'required',
                    'reason' => 'required',
                ];
                $message = [
                    'name.required' => '真是姓名不能为空!',
                    'tel.required' => '电话号码不能为空!',
                    'reason.required' => '申请理由不能为空!',
                ];
                $validator = Validator::make($input, $rules, $message);
                if($validator->passes()) {
                    $input['users_id'] = Auth::User()->id;
                    $input['addtime'] = $input['updtime'] = date('Y-m-d H:i:s');
                    $input['updbyadmin'] = '';
                    unset($input['vf_code']);
                    //需要查询 看看是否第一次添加
                    if(Joinus::insert($input)) {
                        return back()->with('errors', '您已经成功申请');
                    } else {
                        return back()->with('errors', '信息不完善');
                    }
                } else {
                    return back()->withErrors($validator);
                }
            }
        } else {
            return back()->with('errors', '请认真填写每一项信息！');
        }
    }

    public function vf_code(){
        $vf_code = new \Code();
        return $vf_code->make();
    }
}
