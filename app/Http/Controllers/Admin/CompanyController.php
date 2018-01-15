<?php

namespace App\Http\Controllers\Admin;

use App\http\Model\Admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::select('company.*','users.name as user_name')->leftJoin('users','company.users_id','=','users.id')->orderBy('com_id','desc')->paginate(10);
        return view('admin.comp.index',compact(['data']));
    }

    public function create()
    {
        return view('admin.comp.add');
    }

    public function store(Request $request)
    {
        $input = $request->input();
        dd($input);
    }
    
    public function edit($id)
    {
        $info = Company::select('company.*','users.name as user_name')->leftJoin('users','company.users_id','=','users.id')->where('com_id',$id)->first();
        return view('admin.comp.info')->with('info',$info);
    }

    public function destroy($id)
    {
        if(Company::where('com_id',$id)->delete()){
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
