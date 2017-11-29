<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin.cate.add')->with('data',$data);
    }
}
