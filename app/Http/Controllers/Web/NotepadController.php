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
        $list = Notepad::all();
        return view('web.index',compact('list'));
    }
}
