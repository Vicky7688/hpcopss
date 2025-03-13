<?php

namespace App\Http\Controllers;

use App\Models\GroupMaster;
 
use Illuminate\Http\Request;

class Paginationcontroller extends Controller
{
    public function form(){
       
        return view('form');
    }



    public function formget(Request $request){
       
      
    $start = $request->input('start', 0);
    $length = $request->input('length', 10);
    $searchValue = $request->input('search.value', '');
    $orderColumn = $request->input('order.0.column', 0);
    $orderDirection = $request->input('order.0.dir', 'asc');
    $columns = ['id', 'branchtype', 'status'];
    $query = GroupMaster::query();
    if ($searchValue) {
        $query->where('branchtype', 'like', '%' . $searchValue . '%');
        $query->orwhere('status', 'like', '%' . $searchValue . '%');
    }
    $query->orderBy($columns[$orderColumn], $orderDirection);
    $totalRecords = $query->count();
    $branchtypes = $query->offset($start)
                        ->limit($length)
                        ->get();
    return response()->json([
        'draw' => (int) $request->input('draw'),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalRecords,
        'data' => $branchtypes
    ]);
    }
}
