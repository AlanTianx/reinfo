<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Webconfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index()
    {
        $info = Webconfig::first();
        return view('admin.config.index',compact('info'));
    }

    public function insert(Request $request)
    {
        $input = $request->except('_token');
        if($input['id']){
            $input['updtime'] = date('Y-m-d H:i:s');
            if(Webconfig::where('id',$input['id'])->update($input)){
                return redirect('admin/config')->with('errors','修改成功');
            }else{
                return back()->with('errors','服务器异常，请稍候再试');
            }
        }else{
            $input['addtime'] = date('Y-m-d H:i:s');
            $input['updtime'] = date('Y-m-d H:i:s');
            if(Webconfig::insert($input)){
                return redirect('admin/config')->with('errors','添加成功');
            }else{
                return back()->with('errors','服务器异常，请稍候再试');
            }
        }
    }
}
