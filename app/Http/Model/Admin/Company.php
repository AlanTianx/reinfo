<?php

namespace App\http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'com_id';
    public $timestamps = false;
    protected $guarded = [];
}
