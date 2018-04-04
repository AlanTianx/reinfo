<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Webconfig extends Model
{
    protected $table = 'config';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
