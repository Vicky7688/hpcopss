<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\GroupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GroupMasterController extends Controller
{
    public function groupindex(){
        $groups = DB::table('group_masters')->orderBy('id','ASC')->get();
        $data['groups'] = $groups;
        return view('masters.groupmaster',$data);
    }

    public function generategroupcode(Request $post){
        $rules = [
            'groupname' => 'required'
        ];

        $validator = Validator::make($post->all(),$rules);

        if($validator->fails()){
            return response()->json(['status' => 'Fail','messages' => 'Check Fields']);
        }

        $group_name = strtoupper($post->groupname);
        $newgroup_code = '';
        $first_name = substr($group_name, 0, 3);

        DB::beginTransaction();

        try {

            $last_group_code = DB::table('group_masters')->where('group_code', 'LIKE', $first_name . '%')
                ->orderBy('group_code', 'desc')
                ->lockForUpdate()
                ->first();

            if (!empty($last_group_code)) {
                $last_number = substr($last_group_code->group_code, -3);
                $new_number = str_pad($last_number + 1, 2, '0', STR_PAD_LEFT);
            } else {
                $new_number = '01';
            }

            $newgroup_code = $first_name . $new_number;

            return response()->json([
                'status' => 'success',
                'newgroup_code' => $newgroup_code
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'fail',
                'messages' => 'An error occurred: ' . $e->getMessage(),
                'lines' => $e->getLine()
            ]);
        }
    }

    public function groupinsert(Request $post){
        $rules = [
            "name" => "required",
            "groupCode" => "required",
            "type" => "required",
            "status" => "required",
            "nature" => "required"
        ];

        $validator = Validator::make($post->all(),$rules);
        if($validator->fails()){
            return response()->json(['status' => 'Fail','messages' => 'Check All Fields']);
        }

        $sessionId = Session::get('sessionId');
        $userId = Session::get('userId');

        GroupMaster::create([
            'group_code' => $post->groupCode,
            'group_name' => ucwords($post->name),
            'group_type' => $post->type,
            'balsheet_head' => ucwords($post->name),
            'drcr' => $post->nature,
            'status' => $post->status,
            'admin_id' => $userId,
            'updatedBy' => $userId,
            'session_id' => $sessionId,
            'can_change' => 'Yes'
        ]);

        return response()->json([
            'status' => 'success',
            'messages' => 'Record Inserted Successfully'
        ]);
    }


    public function editgroup(Request $post){
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($post->all(),$rules);
        if($validator->fails()){
            return response()->json(['status' => 'Fail','messages' => 'Check All Fields']);
        }

        $id = $post->id;
        $groupId = DB::table('group_masters')->where('id',$id)->first();

        if(is_null($groupId)){
            return response()->json(['status' => 'Fail','messages' => 'Record Not Found']);
        }else{
            return response()->json(['status' => 'success','groupsDetails' => $groupId]);
        }
    }

    public function groupupdate(Request $post){
        $groupid = $post->groupid;

        $updateGroup = GroupMaster::where('id',$groupid)->first();

        $sessionId = Session::get('sessionId');
        $userId = Session::get('userId');

        if(!empty($updateGroup)){
            // $updateGroup->group_code = $post->groupCode;
            $updateGroup->group_name = ucwords($post->name);
            $updateGroup->group_type = $post->type;
            $updateGroup->balsheet_head = ucwords($post->name);
            $updateGroup->drcr = $post->nature;
            $updateGroup->status = $post->status;
            $updateGroup->admin_id = $userId;
            $updateGroup->updatedBy = $userId;
            $updateGroup->session_id = $sessionId;
            $updateGroup->can_change = 'Yes';
            $updateGroup->save();

            return response()->json([
                'status' => 'success',
                'messages' => 'Record Updated Successfully'
            ]);
        }else{
            return response()->json([
                'status' => 'Fail',
                'messages' => 'Some Technical Issue'
            ]);
        }
    }

    public function deletegroup(Request $post){
        $groupId = $post->id;
        $exits_groupId = GroupMaster::where('id',$groupId)->first();

        if(is_null($exits_groupId)){
            return response()->json(['status' => 'Fail','messages' => 'Record Not Found']);
        }else{
            $exits_groupId->delete();
            return response()->json(['status' => 'success','messages' => 'Record Deleted successfully']);
        }
    }
}
