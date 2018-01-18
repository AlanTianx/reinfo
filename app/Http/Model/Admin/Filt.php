<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Filt extends Model
{
    protected $table = 'filt';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
