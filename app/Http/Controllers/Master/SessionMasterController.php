<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\SessionMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SessionMasterController extends Controller
{
    public function session(){
        $sessions = DB::table('session_masters')->orderBy('id','ASC')->get();
        $data['sessions'] = $sessions;
        return view('masters.session',$data);
    }


    public function sessioninsert(Request $post){
        $validator = Validator::make($post->all(), [
            'startDate' => 'required|date_format:d-m-Y',
            'endDate' => 'required|date_format:d-m-Y'
        ]);

        if($validator->passes()){
            $start_date = date('Y-m-d',strtotime($post->startDate));
            $end_date = date('Y-m-d',strtotime($post->endDate));

            if($post->start_date){
                $financial_year_start_date = date('Y-m-d', strtotime('01-04-'.date('Y', strtotime($post->startDate))));
                $financial_year_end_date = date('Y-m-d', strtotime('31-03-'.(date('Y', strtotime($financial_year_start_date)) + 1)));
            } else {
                $financial_year_start_date = $start_date;
                $financial_year_end_date = $end_date;
            }

            $exists = DB::table('session_masters')->where('startDate', $financial_year_start_date)
                        ->where('endDate', $financial_year_end_date)
                        ->exists();
            $session_name = date('Y',strtotime($start_date)).'-'.date('y',strtotime($end_date));

            if(!$exists){
                $audit_performed = $post->auditPerformed;
                $status = $post->status;
                $userId = Session::get('userId');

                $sessionMaster = new SessionMaster();
                $sessionMaster->startDate = $financial_year_start_date;
                $sessionMaster->endDate = $financial_year_end_date;
                $sessionMaster->session_name = $session_name;
                $sessionMaster->auditPerformed = $audit_performed;
                $sessionMaster->updatedBy = $userId;
                $sessionMaster->save();

                return response()->json(['status' => 'success', 'messages' => 'Session Added Successfully']);
            } else {
                return response()->json(['status' => 'fail', 'messages' => 'Session Already Exists']);
            }

        } else {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Fields']);
        }
    }

    public function editsession(Request $post){
        $rules = [
            'id' => 'required',
        ];

        $validator = Validator::make($post->all(),$rules);

        if($validator->fails()){
            return response()->json(['status' => 'Fail','messages' => 'Check Id']);
        }

        $sessionId = Session::get('sessionId');
        $userId = Session::get('userId');
        $id = $post->id;

        $sessions = DB::table('session_masters')->where('id',$id)->first();
        if(is_null($sessions)){
            return response()->json(['status' => 'Fail','messages' => 'Record Not Found']);
        }else{
            return response()->json(['status' => 'success','sessions' => $sessions]);
        }


    }

    public function sessionupdate(Request $post){

        $validator = Validator::make($post->all(), [
            'startDate' => 'required|date_format:d-m-Y',
            'endDate' => 'required|date_format:d-m-Y',
            'sessionid' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'messages' => 'Check Fields']);
        }


        try {
            $id = $post->sessionid;
            $start_date = date('Y-m-d',strtotime($post->startDate));
            $end_date = date('Y-m-d',strtotime($post->endDate));

            // Financial Year Dates Calculation
            $financial_year_start_date = date('Y-m-d', strtotime('01-04-' . date('Y', strtotime($post->startDate))));
            $financial_year_end_date = date('Y-m-d', strtotime('31-03-' . (date('Y', strtotime($financial_year_start_date)) + 1)));


            $exists = SessionMaster::where('id','!=',$id)
                ->where('startDate', $financial_year_start_date)
                ->where('endDate', $financial_year_end_date)
                ->exists();


            $session_name = date('Y', strtotime($start_date)) . '-' . date('y', strtotime($end_date));

            $userId = Session::get('userId');

            if(!$exists){
                $update = SessionMaster::find($id);
                if (!$update) {
                    return response()->json(['status' => 'fail', 'messages' => 'Session not found']);
                }else{

                    $update->startDate = $financial_year_start_date;
                    $update->endDate = $financial_year_end_date;
                    $update->auditPerformed = $post->auditPerformed;
                    $update->session_name = $session_name;
                    $update->status = $post->status;
                    $update->updatedBy = $userId;
                    $update->save();

                    // Update session variables
                    session(['audit' => $update->auditPerformed === "Yes" ? "1" : "0"]);
                    session(['sessionId' => $update->id]);
                    return response()->json(['status' => 'success', 'messages' => 'Session updated successfully']);
                }

            }else{
                return response()->json(['status' => 'fail', 'messages' => 'Session Already Exists']);
            }

        } catch (\Exception $e) {
            // Log::error('Error updating Session data: ', ['error' => $e->getMessage()]);

            return response()->json([
                'status' => 'fail',
                'message' => 'Failed to modify data. Please try again later.',
                'error' => $e->getMessage(),
                'lines' => $e->getLine()
            ]);
        }
    }
}
