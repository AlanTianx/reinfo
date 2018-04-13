<?php

namespace App\Http\Model\Web;

use Illuminate\Database\Eloquent\Model;

class Joinus extends Model
{
    protected $table = 'join_us';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
