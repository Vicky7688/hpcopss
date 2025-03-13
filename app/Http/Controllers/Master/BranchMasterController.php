<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchMasterController extends Controller
{
    public function branchindex(){
        return view('masters.branchmaster');
    }
}
