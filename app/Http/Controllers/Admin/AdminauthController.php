<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Adminauth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminauthController extends Controller
{
    public function index()
    {
        $data = Adminauth::all();
        return view('admin.auth.index',compact('data'));
    }

    public function create()
    {
        $groups = collect(app()->routes->getRoutes())->groupBy('uri')->keys()->filter(function($value,$key){
            $c = explode('/',$value);
            return $c[0] == 'admin'&&!in_array($c[1],['login','vf_code','info','index','upd_pass','logout','test']);
        });
        //dd($groups);
        //$data = Adminauth::where('pid',0)->get();
        return view('admin.auth.add',compact(['groups']));
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['time'] = date('Y-m-d H:i:s');
        if(Adminauth::insert($input)){
            return redirect('admin/adminauth')->with('errors','权限组添加成功');
        }
    }
}
