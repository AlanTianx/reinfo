<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Admin\Audit;
use App\Http\Model\Admin\Category;
use App\Http\Model\Admin\Filt;
use App\Http\Model\Web\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CompushController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('web.comp.index', compact('data'));
    }

    public function comppush(Request $request)
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
            $input['com_img'] = $input['com_img'] ?? '';
            $input['com_view'] = $input['com_view'] ?? 0;
            $input['users_id'] = Auth::user()->id ?? 3;

            //敏感词汇验证
            if(Redis::exists('filts')){
                $filts = json_decode(Redis::get('filts'),true);
                $new_filts = json_decode(Redis::get('new_filts'),true);
            }else{
                $filts = Filt::pluck('name');
                $filts = $filts->toArray();
                $new_filts =array();
                foreach ($filts as $v){
                    $new_filts[] = '<font color="red">'.$v.'</font>';
                }
                Redis::set('filts', collect($filts));
                Redis::set('new_filts', collect($new_filts));
            }

            $strLen = mb_strlen($input['com_content'],'utf-8');
            $rep_content = str_replace($filts,$new_filts,$input['com_content']);
            if(mb_strlen($rep_content,'utf-8') > $strLen){
                $input['type_id'] = '2';
                if($ret = Company::insertGetId($input)){
                    $data['com_id'] = $ret;
                    $data['content'] = $rep_content;
                    $data['status'] = '2';
                    $data['addtime'] = date('Y-m-d H:i:s',time());
                    $data['lastupdtime'] = date('Y-m-d H:i:s',time());
                    Audit::insert($data);
                    return redirect('comppush')->with('errors','添加成功');
                }else{
                    return back()->with('errors','添加错误，请稍后再试');
                }
            }else{
                if(Company::insert($input)){
                    return redirect('admin/company')->with('errors','添加成功');
                }else{
                    return back()->with('errors','添加错误，请稍后再试');
                }
            }
        }else{
            return back()->withErrors($validator);
        }
    }
}
