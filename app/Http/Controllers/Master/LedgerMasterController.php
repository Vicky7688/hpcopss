<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\LedgerMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LedgerMasterController extends Controller
{
    public function ledgerindex()
    {
        $ledgers = DB::table('ledger_masters')->orderBy('id', 'ASC')->get();
        $groups = DB::table('group_masters')->whereNotIn('group_code', ['C002', 'SUND001', 'SUNC001'])->orderBy('id', 'ASC')->get();
        $data['ledgers'] = $ledgers;
        $data['groups'] = $groups;
        return view('masters.ledgermaster', $data);
    }

    public function generateledgercode(Request $post)
    {
        $rules = [
            'ledger_name' => 'required'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check Fields']);
        }

        $ledger_name = strtoupper($post->ledger_name);
        $newgroup_code = '';

        $first_name = substr($ledger_name, 0, 4);

        DB::beginTransaction();

        try {

            $last_group_code = LedgerMaster::where('ledger_code', 'LIKE', $first_name . '%')
                ->orderBy('ledger_code', 'desc')
                ->lockForUpdate()
                ->first();


            if (!empty($last_group_code)) {
                $last_number = (int)substr($last_group_code->ledger_code, -3);
                $new_number = str_pad($last_number + 1, 2, '0', STR_PAD_LEFT);
            } else {
                $new_number = '01';
            }


            $newgroup_code = $first_name . $new_number;

            if (!LedgerMaster::where('ledger_code', $newgroup_code)->exists()) {
                DB::commit();
                return response()->json(['status' => 'success', 'newgroup_code' => $newgroup_code]);
            } else {

                DB::rollBack();
                return response()->json(['status' => 'fail', 'messages' => 'Code already exists. Please try again.']);
            }
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([
                'status' => 'fail',
                'messages' => 'An error occurred: ' . $e->getMessage(),
                'lines' => $e->getLine()
            ]);
        }
    }

    public function ledgerInsert(Request $post)
    {
        $rules = [
            "groupCode" => "required",
            "name" => "required",
            "ledgerCode" => "required",
            "openingType" => "required",
            "status" => "required"
        ];

        $validator = Validator::make($post->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Fields']);
        }


        $sessionId = Session::get('sessionId');
        $userId = Session::get('userId');

        LedgerMaster::create([
            'group_code' => $post->groupCode,
            'ledger_name' => ucwords($post->name),
            'ledger_code' => $post->ledgerCode,
            'reference_id' => null,
            'openingAmount' => $post->openingAmount,
            'openingType' => $post->openingType,
            'status' => $post->status,
            'admin_id' => $userId,
            'updatedBy' => $userId,
            'session_id' => $sessionId,
            'can_change' => 'Yes',
        ]);

        return response()->json([
            'status' => 'success',
            'messages' => 'Record Inserted Successfully'
        ]);
    }

    public function editledger(Request $post)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($post->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Fields']);
        }

        $id = $post->id;
        $ledgerId = DB::table('ledger_masters')->where('id', $id)->first();

        if (is_null($ledgerId)) {
            return response()->json(['status' => 'Fail', 'messages' => 'Record Not Found']);
        } else {
            return response()->json(['status' => 'success', 'ledgerDetails' => $ledgerId]);
        }
    }


    public function updateledger(Request $post)
    {
        $rules = [
            "ledgerid" => "required",
            // "groupCode" => "required",
            "name" => "required",
            "ledgerCode" => "required",
            "openingType" => "required",
            "status" => "required"
        ];

        $validator = Validator::make($post->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Fields']);
        }

        $ledgerId = $post->ledgerid;
        $sessionId = Session::get('sessionId');
        $userId = Session::get('userId');

        $updateLedger = DB::table('ledger_masters')->where('id', $ledgerId)->first();

        if (!empty($updateLedger)) {
            DB::table('ledger_masters')
                ->where('id', $ledgerId)
                ->update([
                    'group_code' => $post->groupCode,
                    'ledger_name' => ucwords($post->name),
                    // 'ledger_code' => $post->ledgerCode,
                    'reference_id' => null,
                    'openingAmount' => $post->openingAmount,
                    'openingType' => $post->openingType,
                    'status' => $post->status,
                    'admin_id' => $userId,
                    'updatedBy' => $userId,
                    'session_id' => $sessionId,
                    'can_change' => 'Yes',
                    'updated_at' => now(),
                ]);

            return response()->json([
                'status' => 'success',
                'messages' => 'Record Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'Fail',
                'messages' => 'Some Technical Issue'
            ]);
        }
    }

    public function deleteledger(Request $post){
        $ledgerId = $post->id;
        $exits_ledgerId = LedgerMaster::where('id',$ledgerId)->first();

        if(is_null($exits_ledgerId)){
            return response()->json(['status' => 'Fail','messages' => 'Record Not Found']);
        }else{
            $exits_ledgerId->delete();
            return response()->json(['status' => 'success',
                'messages' => 'Record
                 Deleted successfully'
            ]);
        }
    }
}
