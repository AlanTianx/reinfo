<?php

namespace App\Http\Model\Web;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'company';//数据库名
    protected $primaryKey = 'com_id';//主键
    public $timestamps = false;//关闭自动更新时间

    public function ajaxsearch($keywords)
    {
        $where = array(
            ['com_name','like',"%$keywords%"]
        );
        $list = $this->where('type_id',1)->where($where)->limit(4)->select('com_name','com_id')->get();
        return $list;
    }

    public function likesearch($keywords)
    {
        $where = array(
            ['com_name','like',"%$keywords%"],
            ['com_title','like',"%$keywords%"],
            ['com_content','like',"%$keywords%"]
        );
        $list = $this->where('type_id',1)->where(function ($query) use($keywords){
                                                        $query->orWhere('com_name','like',"%$keywords%")
                                                            ->orWhere('com_title','like',"%$keywords%")
                                                            ->orWhere('com_content','like',"%$keywords%");
                                                    })
            ->select('company.*','users.name as user_name')
            ->leftJoin('users','company.users_id','=','users.id')->orderBy('com_id','desc')->paginate(8);

        return $list;
    }
}
