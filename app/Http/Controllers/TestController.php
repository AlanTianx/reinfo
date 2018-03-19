<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TestController extends Controller
{
    //
    public function index()
    {
        return Crypt::encrypt('123456');
    }
}
