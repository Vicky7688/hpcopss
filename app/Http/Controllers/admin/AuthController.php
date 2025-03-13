<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRoleMasters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Hash;
class AuthController extends Controller
{
    public function index()
    {
        $sessions = DB::table('session_masters')->orderBy('session_name', 'ASC')->get();
        $branches = DB::table('branch_masters')->orderBy('id','ASC')->get();
        $userstyp = UserRoleMasters::orderBy('id','ASC')->get();
        $data['sessions'] = $sessions;
        $data['branches'] = $branches;
        $data['userstyp'] = $userstyp;
        return view('admin.login', $data);
        // return view('admin.login');
    }




    public function authlogin(Request $post)
    {

        if(!empty($post->username) &&  !empty($post->password)){

            $exist = User::where('username','=',$post->username)->first();
            if($exist){
                // if($post->user_type==$exist->role_id){
                if (Hash::check($post->password, $exist->password)) {
                    $post->session()->put('adminloginid', $exist->id);
                    $post->session()->put('adminsessionid', $post->session);
                    $post->session()->put('adminname', $exist->name);
                    $post->session()->put('adminusername', $exist->username);
                    $post->session()->put('adminbranch', $exist->refId);
                    $post->session()->put('admin', $exist);
                    return response()->json(['status' => 'success', 'redirect_url' => url('dashboard')]);
                // }else{
                //     return response()->json(['status' => 'Fail', 'message' => 'Invalid Password']);
                // }
            }else{
                return response()->json(['status' => 'Fail', 'message' => 'Invalid User Type']);
            }
                }else{
                    return response()->json(['status' => 'Fail', 'message' => 'Invalid User Type']);
                }

            }else{
                return response()->json(['status' => 'Fail', 'message' => 'Fill All Fields']);
            }

    }


    public function dashboard(){
        return view('dashboard');
    }

    public function logout(Request $post)
    {

        Session::forget('adminloginid');
        Session::forget('adminsessionid');
        Session::forget('adminname');
        Session::forget('adminusername');
        Session::forget('adminbranch');
        Session::forget('admin');
        return redirect()->route('login');
    }

}
