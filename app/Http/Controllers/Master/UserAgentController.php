<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    public function useragentindex(){
        return view('masters.useragent');
    }
}
