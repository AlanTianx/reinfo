<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Adminauth;
use App\Http\Model\Admin\RouteList;
use App\Http\Model\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Annotation\Route;

class AdminauthController extends Controller
{
    public function index()
    {
        $data = Adminauth::orderBy('id','asc')->paginate(10);
        //dd($data);
        return view('admin.auth.index',compact('data'));
    }

    public function create()
    {
//        $groups = collect(app()->routes->getRoutes())->groupBy('uri')->keys()->filter(function($value,$key){
//            $c = explode('/',$value);
//            return $c[0] == 'admin'&&!in_array($c[1],['login','vf_code','info','index','upd_pass','logout','test']);
//        });
//        dd($groups);
        $data = Adminauth::where('pid',0)->get();
        //$adminList = User::all();
        $list = RouteList::all();
        return view('admin.auth.add',compact(['list','data']));
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['time'] = date('Y-m-d H:i:s');
        $input['route_list_id'] = trim(implode(',',$input['route_list_id']));
        if(Adminauth::insert($input)){
            return redirect('admin/adminauth')->with('errors','权限组添加成功');
        }else{
            return back()->with('errors','服务器异常，请稍候再试');
        }
    }

    public function edit($id)
    {
        $info = Adminauth::where('id',$id)->first();
        $data = Adminauth::where('pid',0)->get();
        $list = RouteList::all();
        return view('admin.auth.edit',compact(['info','data','list']));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $input['time'] = date('Y-m-d H:i:s');
        $input['route_list_id'] = trim(implode(',',$input['route_list_id']));
        if(Adminauth::where('id',$id)->update($input)){
            return redirect('admin/adminauth')->with('errors','修改成功');
        }else{
            return back()->with('errors','修改失败，请稍候再试');
        }
    }
    public function destroy($id)
    {
        if(Adminauth::where('id',$id)->delete()){
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
