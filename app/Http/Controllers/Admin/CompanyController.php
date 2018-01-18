<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use App\http\Model\Admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::select('company.*','users.name as user_name')->leftJoin('users','company.users_id','=','users.id')->orderBy('com_id','desc')->paginate(10);
        return view('admin.comp.index',compact(['data']));
    }

    public function create()
    {
        $data = Category::all();
        return view('admin.comp.add',compact('data'));
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'com_name' => 'required',
            'com_title' => 'required',
            'com_position' => 'required',
            'com_content' => 'required'
        ];
        $message = [
            'com_name.required' => '公司名必须填写',
            'com_title.required' => '标题不能为空',
            'com_position.required' => '招聘职位总得说吧',
            'com_content.required' => '内容你也要为空？',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $input['com_time'] = date('Y-m-d H:i:s');
            $input['com_img'] = isset($input['com_img'])?$input['com_img']:'';
            $input['com_view'] = isset($input['com_view'])?$input['com_view']:0;
            $input['users_id'] = isset(Auth::user()->id)?Auth::user()->id:1;
            if(Company::insert($input)){
                return redirect('admin/company')->with('errors','添加成功');
            }else{
                return back()->with('errors','服务器异常，请稍后再试');
            }
        }else{
            return back()->withErrors($validator);
        }
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
