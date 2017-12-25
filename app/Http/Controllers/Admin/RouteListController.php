<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\RouteList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RouteListController extends Controller
{
    public function index()
    {
        $routeInfo = RouteList::all();
        //dd($routeInfo);
        return view('admin.routeList.index',compact('routeInfo'));
    }

    public function create()
    {
        return view('admin.routeList.add');
    }

    //提交添加信息
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'name' => 'required',
            'route' => 'required',
        ];
        $message = [
            'name.required' => '路由名必须填写',
            'route.required' => '路由地址必须填写',
        ];
        $validator = Validator::make($input,$rules,$message);
        $input['time'] = date('Y-m-d H:i:s');
        //dd($input);
        if($validator->passes()){
            if($re = RouteList::create($input)){
                return redirect('admin/routeList');
            }else{
                return back()->with('errors','服务器异常，请稍后再试');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $routeInfo = RouteList::where('id',$id)->first();
        return view('admin.routeList.edit',compact('routeInfo'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $input['route'] = $input['route'] ? $input['route'] : '';
        $input['time'] = date('Y-m-d H:i:s');
        if(RouteList::where('id',$id)->update($input)){
            return redirect('admin/routeList')->with('error','修改成功');
        }else{
            return back()->with('errors','修改失败，请稍候再试');
        }
    }

    //删除
    public function destroy($id)
    {
        if(RouteList::where('id',$id)->delete()){
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
