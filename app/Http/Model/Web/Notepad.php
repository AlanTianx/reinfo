<?php

namespace App\Http\Model\Web;

use Illuminate\Database\Eloquent\Model;

class Notepad extends Model
{
    protected $table = 'users_notepad';//数据库名
    protected $primaryKey = 'id';//主键
    public $timestamps = false;//关闭自动更新时间
    protected $guarded = [];//添加时的字段黑名单 -- 不允许添加字段
}
