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
        $list = Audit::where('status',$type)->orderBy('id','desc')->paginate(5);
        return view('admin.audit_comp.index',compact('list','type'));
    }

    public function auditPass(Request $request)
    {
        $input = $request->input();
        $info = Audit::find($input['id']);
        $info->status = $input['ty'];
        $info->lastupdtime = date('Y-m-d H:i:s',time());

        $comp = Company::find($info->com_id);
        $comp->type_id = $input['ty'];

        if($info->update() && $comp->update()){
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
