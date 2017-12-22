<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function tree()
    {
        $menu = $this->orderBy('order','asc')->get();
        $arr = array();
        foreach ($menu as $k => $v){
            $menu[$k]['display'] = $v['display']==1 ? '显示' : '隐藏';
            if($v['fid']=='0'){
                $arr[] = $menu[$k];
                foreach ($menu as $key => $value){
                    if($value['fid']==$v['id']){
                        $menu[$key]['name'] = '　　'.$value['name'];
                        $arr[] = $menu[$key];
                    }
                }
            }
        }
        return $arr;
    }
}
