<?php

namespace App\Http\Controllers;

use App\Http\Model\Admin\Adminauth;
use App\Http\Model\Admin\RouteList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{
    //
    public function index()
    {
        $list =  Adminauth::pluck('route_list_id','id');
        foreach ($list as $k => $value){
            $arr = explode(',',$value);
            $key = array_search(28,$arr);
            if(isset($key)){
                unset($arr[$key]);
            }
            $str = implode(',',$arr);
            $data['route_list_id'] = $str;
            Adminauth::where('id',$k)->update($data);
        }
        dd($list);
        //return Crypt::encrypt('123456');
    }
}
