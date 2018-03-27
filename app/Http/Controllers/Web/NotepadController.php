<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Web\Notepad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotepadController extends Controller
{
    //
    public function index()
    {
        $list = Notepad::orderBy('id','asc')->paginate(10);
        return view('web.home.index',compact('list'));
    }

    public function ajaxgetnotepad($status = 1)
    {
        $where = array(
            'status' => $status,
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
}
