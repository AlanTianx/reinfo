<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Audit;
use App\http\Model\Admin\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{
    //
    public function index($type)
    {
        $list = Audit::select('audit_company.*','users.name as user_name')->leftJoin('users','users_id','=','users.id')->where('status',$type)->orderBy('com_id','desc')->paginate(10);
        dd($list);
        return view('admin.audit_comp.index',compact('list','type'));
    }

    public function auditPass(Request $request)
    {
        $input = $request->input();
        $info = Audit::find($input['id']);
        $info->type_id = $input['ty'];
        $comp = Company::find($info->com_id);
        $comp->type_id = $input['ty'];
        if($info->update()&&$comp->update()){
            if($input['ty']=='1'){
                return [
                    'status' => 0,
                    'msg' => '成功通过'
                ];
            }elseif($input['ty']=='3'){
                return [
                    'status' => 0,
                    'msg' => '成功删除'
                ];
            }else{
                return [
                    'status' => 1,
                    'msg' => '非法操作'
                ];
            }
        }else{
            return [
                'status' => 1,
                'msg' => '服务器异常，请稍后再试'
            ];
        }
    }
}
