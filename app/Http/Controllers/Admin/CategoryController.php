<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('cate_id','asc')->paginate(2);
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
            }
        }
    }
}
