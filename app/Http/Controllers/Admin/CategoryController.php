<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('cate_order','asc')->paginate(10);
        return view('admin.cate.index',compact('data'));
    }

    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin.cate.add')->with('data',$data);
    }

    public function store(Request $request)
    {
        if($input = $request->except('_token')){
            $input['cate_time'] = date('Y-m-d H:i:s');
            if(Category::insert($input)){
                return redirect('admin/category')->with('errors','分类添加成功');
            }else{
                return back()->with('errors','服务器异常，请稍候再试');
            }
        }else{
            return back()->with('errors','删除请点击删除按钮操作');
        }
    }

    public function destroy($id)
    {
        if(Category::where('cate_id',$id)->delete()){
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

    public function ajaxChangeOrder($id,$order)
    {
        $info = Category::where('cate_id',$id)->first();
        $info['cate_order'] = $order;
        if($info->update()){
            return ['code'=>0,'msg'=>'排序更新成功'];
        }else{
            return ['code'=>1,'msg'=>'服务器异常，请稍候再试'];
        }
    }
}
