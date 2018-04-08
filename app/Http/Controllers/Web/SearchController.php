<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Web\Search;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $announcement = session('webInfo.announcement');
        return view('web.search.index')->with('announcement',$announcement);
    }

    public function search(Request $request)
    {
        $keywords = $request->only('keywords');
        if(!$keywords['keywords']){
           return redirect('/so');
        }else{
            $list = (new Search)->likesearch($keywords['keywords']);
            $list->appends(['keywords' => $keywords['keywords']])->render();
            return view('web.search.results',compact('list','keywords'));
        }
    }

    public function Ajaxsearch(Request $request)
    {
        $keywords = $request->only('keywords');
        if($keywords['keywords']){
            $list = (new Search)->ajaxsearch($keywords['keywords']);
        }else{
            $list = array();
        }
        $res = array(
            'code' => 200,
            'list' => $list
        );
        return $res;
    }
}
