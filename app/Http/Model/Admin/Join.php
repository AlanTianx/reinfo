<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = 'join_us';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
