<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menutree = (new Menu())->tree();
        return view('admin.menu.index',compact('menutree'));
    }
    //添加信息
    public function create()
    {
        $list = Menu::where('fid','0')->get();
        return view('admin.menu.add',compact('list'));
    }
    //提交添加信息
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['url'] = $input['url'] ? $input['url'] : '';
        $rules = [
            'name' => 'required',
        ];
        $message = [
            'name.required' => '菜单名称必须填写',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            if($re = Menu::create($input)){
                return redirect('admin/menu');
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
        $info = Menu::find($id);
        $list = Menu::where('fid','0')->get();
        return view('admin.menu.edit',compact('info','list'));
    }
    //提交编辑后的信息
    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $input['url'] = $input['url'] ? $input['url'] : '';
        if(Menu::where('id',$id)->update($input)){
            return redirect('admin/menu')->with('errors','修改成功');
        }else{
            return back()->with('errors','修改失败，请稍候再试');
        }
    }
    //删除
    public function destroy($id)
    {
        if(Menu::where('id',$id)->delete()){
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

    public function ajaxorder(Request $request)
    {
        $input = $request->input();
        $info = Menu::find($input['id']);
        $info->order = $input['order'];
        if($info->update()){
            return [
                'code' => 0,
                'msg' => '修改成功',
            ];
        }else{
            return [
                'code' => 1,
                'msg' => '服务器异常，请稍候再试',
            ];
        }
    }
}
