<?php

namespace App\Http\Controllers;

use App\Http\Model\Admin\Adminauth;
use App\Http\Model\Admin\Filt;
use App\Http\Model\Admin\RouteList;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{
    //
    public function index()
    {
//        $list =  Adminauth::pluck('route_list_id','id');
//        foreach ($list as $k => $value){
//            $arr = explode(',',$value);
//            $key = array_search(28,$arr);
//            if(isset($key)){
//                unset($arr[$key]);
//            }
//            $str = implode(',',$arr);
//            $data['route_list_id'] = $str;
//            Adminauth::where('id',$k)->update($data);
//        }
        $str = '杨玉杰是一个猪头笨蛋';
        $strLen = mb_strlen($str,'utf-8');
        echo $strLen;
        $list = Filt::pluck('name');
        $list = $list->toArray();
        $new_list =array();
        foreach ($list as $v){
            $new_list[] = '<font color="red">'.$v.'</font>';
        }
        $c = str_replace($list,$new_list,$str);
        if(mb_strlen($c,'utf-8')>$strLen){
            echo 11;
        }else{
            echo 22;
        }
        dump($c);
        //return Crypt::encrypt('123456');
    }
}
