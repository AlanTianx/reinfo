<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'audit_company';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
