<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RouteList extends Model
{
    protected $table = 'admin_route_list';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
