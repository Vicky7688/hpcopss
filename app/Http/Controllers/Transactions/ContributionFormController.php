<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContributionFormController extends Controller
{
    public function contributionIndex(){
        return view('transactions.contribution');
    }
}
