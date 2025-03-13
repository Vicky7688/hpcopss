<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ShareMaster;
use Session;
class HeadOfficeBranchMasterController extends Controller
{
    public function headofficeindex()
    {
        $users = User::where("role_id", "=", 2)->get();
        return view("masters.headoffice", compact("users"));
    }

    public function headofficesubmit(Request $request)
    {
        $existemail = User::where("email", "=", $request->email)->first();
        if ($existemail) {
            return response()->json([
                "status" => "Fail",
                "message" => "Email Already Exist",
            ]);
        }
        $existmobile = User::where("mobile", "=", $request->mobile)->first();
        if ($existmobile) {
            return response()->json([
                "status" => "Fail",
                "message" => "Mobile Already Exist",
            ]);
        }
        $existusername = User::where(
            "username",
            "=",
            $request->username
        )->first();
        if ($existusername) {
            return response()->json([
                "status" => "Fail",
                "message" => "Username Already Exist",
            ]);
        }
        $addhead = new User();
        $addhead->name = $request->name;
        $addhead->email = $request->email;
        $addhead->username = $request->username;
        $addhead->role_id = 2;
        $addhead->password = $request->password;
        $addhead->address1 = $request->address1;
        $addhead->address2 = $request->address2;
        $addhead->city = $request->city;
        $addhead->state = $request->state;
        $addhead->pincode = $request->pincode;
        $addhead->landline = $request->landline;
        $addhead->mobile = $request->mobile;
        $addhead->reg_no = $request->reg_no;
        $addhead->zone = $request->zone;
        $addhead->branch_limit = $request->branch_limit;
        $addhead->save();
        return response()->json([
            "status" => "Success",
            "message" => "Head Office updated successfully",
        ]);
    }
    public function editheadofficesubmit(Request $request)
    {
        $existemail = User::where("email", "=", $request->email)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existemail) {
            return response()->json([
                "status" => "Fail",
                "message" => "Email Already Exist",
            ]);
        }
        $existmobile = User::where("mobile", "=", $request->mobile)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existmobile) {
            return response()->json([
                "status" => "Fail",
                "message" => "Mobile Already Exist",
            ]);
        }
        $existusername = User::where("username", "=", $request->username)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existusername) {
            return response()->json([
                "status" => "Fail",
                "message" => "Username Already Exist",
            ]);
        }
        $addhead = User::find($request->id);
        $addhead->name = $request->name;
        $addhead->email = $request->email;
        $addhead->username = $request->username;
        $addhead->role_id = 2;
        if (!empty($request->password)) {
            $addhead->password = $request->password;
        }
        $addhead->address1 = $request->address1;
        $addhead->address2 = $request->address2;
        $addhead->city = $request->city;
        $addhead->state = $request->state;
        $addhead->pincode = $request->pincode;
        $addhead->landline = $request->landline;
        $addhead->mobile = $request->mobile;
        $addhead->reg_no = $request->reg_no;
        $addhead->zone = $request->zone;
        $addhead->branch_limit = $request->branch_limit;
        $addhead->save();
        return response()->json([
            "status" => "Success",
            "message" => "Head Office updated successfully",
        ]);
    }

    public function deleteheadoffice(Request $request)
    {
        $request->validate([
            "id" => "required|exists:users,id",
        ]);
        $user = User::find($request->id);

        if ($user) {
            $user->delete();
            return response()->json([
                "message" => "User deleted successfully",
                "status" => "success",
            ]);
        } else {
            return response()->json(
                ["message" => "User not found", "status" => "error"],
                404
            );
        }
    }

    public function getheadoffice(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);

    }

    public function branchindex()
    { 

        
        $users = User::where("role_id", "=", 3)->where("refId", "=", Session::get('admin')->id)->get();
        $branch_limit = User::where("id", "=", Session::get('admin')->id)->value('branch_limit');
        // dd($users);
        return view("masters.branchmaster", compact("users","branch_limit"));
    }

    public function branchsubmit(Request $request)
    {
        
        $existemail = User::where("email", "=", $request->email)->first();
        if ($existemail) {
            return response()->json([
                "status" => "Fail",
                "message" => "Email Already Exist",
            ]);
        }
        $existmobile = User::where("mobile", "=", $request->mobile)->first();
        if ($existmobile) {
            return response()->json([
                "status" => "Fail",
                "message" => "Mobile Already Exist",
            ]);
        }
        $existusername = User::where(
            "username",
            "=",
            $request->username
        )->first();
        if ($existusername) {
            return response()->json([
                "status" => "Fail",
                "message" => "Username Already Exist",
            ]);
        }
        $addhead = new User();
        $addhead->name = $request->name;
        $addhead->email = $request->email;
        $addhead->username = $request->username;
        $addhead->role_id = 3;
        $addhead->refId = Session::get('admin')->id;
        $addhead->password = $request->password;
        $addhead->address1 = $request->address1;
        $addhead->address2 = $request->address2;
        $addhead->city = $request->city;
        $addhead->state = $request->state;
        $addhead->pincode = $request->pincode;
        $addhead->landline = $request->landline;
        $addhead->mobile = $request->mobile;
        $addhead->reg_no = $request->reg_no;
        $addhead->zone = $request->zone; 
        $addhead->save();
        return response()->json([
            "status" => "Success",
            "message" => "Head Office updated successfully",
        ]);
    }
    public function editbranchsubmit(Request $request)
    {
        $existemail = User::where("email", "=", $request->email)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existemail) {
            return response()->json([
                "status" => "Fail",
                "message" => "Email Already Exist",
            ]);
        }
        $existmobile = User::where("mobile", "=", $request->mobile)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existmobile) {
            return response()->json([
                "status" => "Fail",
                "message" => "Mobile Already Exist",
            ]);
        }
        $existusername = User::where("username", "=", $request->username)
            ->where("id", "!=", $request->id)
            ->first();
        if ($existusername) {
            return response()->json([
                "status" => "Fail",
                "message" => "Username Already Exist",
            ]);
        }
        $addhead = User::find($request->id);
        $addhead->name = $request->name;
        $addhead->email = $request->email;
        $addhead->username = $request->username;
        $addhead->role_id = 3;
        if (!empty($request->password)) {
            $addhead->password = $request->password;
        } 
        $addhead->refId = Session::get('admin')->id;
        $addhead->address1 = $request->address1;
        $addhead->address2 = $request->address2;
        $addhead->city = $request->city;
        $addhead->state = $request->state;
        $addhead->pincode = $request->pincode;
        $addhead->landline = $request->landline;
        $addhead->mobile = $request->mobile;
        $addhead->reg_no = $request->reg_no;
        $addhead->zone = $request->zone; 
        $addhead->save();
        return response()->json([
            "status" => "Success",
            "message" => "Head Office updated successfully",
        ]);
    }

    public function deletebranch(Request $request)
    {
        $request->validate([
            "id" => "required|exists:users,id",
        ]);
        $user = User::find($request->id);

        if ($user) {
            $user->delete();
            return response()->json([
                "message" => "User deleted successfully",
                "status" => "success",
            ]);
        } else {
            return response()->json(
                ["message" => "User not found", "status" => "error"],
                404
            );
        }
    }

    public function getbranch(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }


    public function sharemaster(Request $request)
    { 
        $share = ShareMaster::orderby('type')->get();
        return view("masters.sharemaster",compact('share'));
    }


    public function sharesubmit(Request $request)
    {  
        $validated = $request->validate([
            '_token' => 'required',  
            'type' => 'required',  
            'share_face_value' => 'required|numeric',  
            'minimum_units' => 'required|numeric',
            'admission_fee' => 'required|numeric',
            'processing_fee' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'redemption_withdrawal' =>  'required|numeric',
            'notice_period' =>  'required|numeric',
            'terms' => 'required|string',  
        ]);

        $sahreup=new ShareMaster();
        $sahreup->type=$request->type;
        $sahreup->share_face_value=$request->share_face_value;
        $sahreup->minimum_units=$request->minimum_units;
        $sahreup->admission_fee=$request->admission_fee;
        $sahreup->processing_fee=$request->processing_fee;
        $sahreup->max_amount=$request->max_amount;
        $sahreup->redemption_withdrawal=$request->redemption_withdrawal;
        $sahreup->notice_period=$request->notice_period;
        $sahreup->terms=$request->terms;
        $sahreup->save(); 


        return response()->json([
            "status" => "Success",
            "message" => "Share master Inserted Successfully",
        ]);
    }


    public function getshare(Request $request)
    {  
        $user = ShareMaster::find($request->id);
        return response()->json($user);
    }


    public function editsharesubmit(Request $request)
    {  
        $validated = $request->validate([
            '_token' => 'required',  
            'type' => 'required',  
            'id' => 'required|numeric',  
            'share_face_value' => 'required|numeric',  
            'minimum_units' => 'required|numeric',
            'admission_fee' => 'required|numeric',
            'processing_fee' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'redemption_withdrawal' =>  'required|numeric',
            'notice_period' =>  'required|numeric',
            'terms' => 'required|string',  
        ]);

        $sahreup=ShareMaster::find($request->id);
        $sahreup->type=$request->type;
        $sahreup->share_face_value=$request->share_face_value;
        $sahreup->minimum_units=$request->minimum_units;
        $sahreup->admission_fee=$request->admission_fee;
        $sahreup->processing_fee=$request->processing_fee;
        $sahreup->max_amount=$request->max_amount;
        $sahreup->redemption_withdrawal=$request->redemption_withdrawal;
        $sahreup->notice_period=$request->notice_period;
        $sahreup->terms=$request->terms;
        $sahreup->save(); 


        return response()->json([
            "status" => "Success",
            "message" => "Share master Inserted Successfully",
        ]);
    }


    public function deleteshare(Request $request)
    {
        
        $user = ShareMaster::find($request->id);

        if ($user) {
            $user->delete();
            return response()->json([
                "message" => "deleted successfully",
                "status" => "success",
            ]);
        } else {
            return response()->json(
                ["message" => "User not found", "status" => "error"],
                404
            );
        }
    }
}
