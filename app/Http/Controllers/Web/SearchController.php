<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Admin\Webconfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $info = Webconfig::first();
        return view('web.search.index')->with('announcement',$info['announcement']);
    }
}
