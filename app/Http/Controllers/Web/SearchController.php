<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $announcement = session('webInfo.announcement');
        return view('web.search.index')->with('announcement',$announcement);
    }
}
