<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin\Join;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{
    public function index()
    {
        $list = Join::orderBy('addtime', 'ase')->paginate(10);
        return view('admin.join.index', compact('list'));
    }

    public function del(Request $request)
    {
        $input = $request->only('status', 'id');
        $input['updtime'] = date('Y-m-d H:i:s');
        $input['updbyadmin'] = session('user')->us_name;
        if (Join::where('id',$input['id'])->update($input)) {
            return [
                'status' => 1,
                'msg' => '操作成功',
            ];
        } else {
            return [
                'status' => 0,
                'msg' => '操作失败',
            ];
        }
    }
}
