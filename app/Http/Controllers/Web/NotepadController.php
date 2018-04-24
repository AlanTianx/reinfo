<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Web\Notepad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotepadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list = Notepad::where('users_id',Auth::user()->id)->orderBy('id','asc')->paginate(10);

        return view('web.home.index',compact('list'));
    }

    public function ajaxgetnotepad($status = 1)
    {
        $where = array(
            'users_id' => Auth::user()->id,
        );
        $info = Notepad::where($where)->orderBy('id','desc')->limit(1)->get();
        $msg = array(
            'status' => 'success',
            'list' => $info
        );
        return $msg;
    }

    public function create()
    {
        return view('web.home.add');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['status'] = $input['status'] ?? '0';
        $input['content'] = trim(implode($input['content'],'<br/>'),'<br/>');
        $input['addtime'] = date('Y-m-d H:i:s',time());
        $input['users_id'] = Auth::user()->id;
        if(Notepad::insert($input)){
            return redirect('/notepad');
        }else{
            return back()->with('errors','保存失败！请稍后再试');
        }
    }

    public function edit($id)
    {
        $info = Notepad::where('id',$id)->first();
        $info->content = explode('<br/>',$info->content);
        return view('web.home.edit',compact('info'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $input['content'] = trim(implode($input['content'],'<br/>'),'<br/>');
        if(Notepad::where('id',$id)->update($input)){
            return redirect('notepad');
        }else{
            return back()->with('errors','修改失败，请稍候再试');
        }
    }

    public function destroy($id)
    {
        if(Notepad::where('id',$id)->delete()){
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
