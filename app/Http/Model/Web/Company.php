<?php

namespace App\Http\Model\Web;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'com_id';
    public $timestamps = false;
    protected $guarded = [];

    public function tree($catelist)
    {
        $where =array(
            'type_id' => '1'
        );
        $tree_list = array();
        foreach ($catelist as $value){
            $where['com_type_id'] = $value['cate_id'];
            if($value['cate_pid']==0){
                $list = $this->where($where)->orderBy('com_view','DESC')->limit(2)->get();
                $tree_list[] = array(
                    'cate_id' => $value['cate_id'],
                    'cate_name' => $value['cate_name'],
                    'list' => $list
                );
            }
        }
        foreach ($tree_list as $k => $v){
            foreach ($catelist as $value){
                $where['com_type_id'] = $value['cate_id'];
                if($value['cate_pid']==$v['cate_id']){
                    $list = $this->where($where)->orderBy('com_view','DESC')->limit(2)->get();
                    $tree_list[$k]['z'][] = array(
                        'cate_name' => $value['cate_name'],
                        'list' => $list
                    );
                }
            }
        }
        return $tree_list;
    }
}
