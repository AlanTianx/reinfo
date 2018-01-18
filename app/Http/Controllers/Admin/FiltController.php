<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Filt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiltController extends Controller
{
    public function index()
    {
        $data = Filt::all();
        return view('admin.filt.index',compact('data'));
    }
    //添加信息
    public function create()
    {
        return view('admin.filt.add');
    }
    //提交添加信息
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'name' => 'required',
        ];
        $message = [
            'name.required' => '敏感词汇必须填写',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $input['time'] = date('Y-m-d H:i:s');
            if($re = Filt::create($input)){
                return redirect('admin/filt')->with('errors','添加成功');
            }else{
                return back()->with('errors','服务器异常，请稍后再试');
            }
        }else{
            return back()->withErrors($validator);
        }
    }
    //编辑信息
    public function edit($id)
    {
        $info = filt::find($id);
        return view('admin.filt.edit',compact('info'));
    }
    //提交编辑后的信息
    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        if(Filt::where('id',$id)->update($input)){
            return redirect('admin/filt')->with('errors','修改成功');
        }else{
            return back()->with('errors','修改失败，请稍候再试');
        }
    }
    //删除
    public function destroy($id)
    {
        if(Filt::where('id',$id)->delete()){
            return [
                'status' => 0,
                'msg' => '成功删除',
            ];
        }else{
            return [
                'status' => 1,
                'msg' => '服务器异常，请稍后再试',
            ];
        }
    }
}
