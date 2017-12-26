<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Adminauth extends Model
{
    protected $table = 'auth_route_group';
    protected $primaryKey = 'id';
    public $timestamps = false;
//    /protected $guarded = [];
}
