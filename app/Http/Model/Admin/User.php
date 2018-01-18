<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'us_id';
    public $timestamps = false;

    protected function Verify_pass($name,$pass){
        $user = $this->where('us_name',$name)->first();
        if($user){
            if(Crypt::decrypt($user->us_pwd)==$pass){
                session(['user'=>$user]);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
}
