<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Models\KycAccount;
use App\Models\District;
use App\Models\State;
use App\Models\ShareMaster;
use App\Models\Membership;
use App\Models\memberid_numbers;
use Illuminate\Http\Request; 
use DB;
class MemberAccountController extends Controller
{
    public function memberaccountindex(){

        $district=District::orderby('district_title')->get();
        $state=State::orderby('state_title')->get();
        $share=ShareMaster::orderby('type')->get();
        $mem=Membership::orderby('id')->get();
        $data=compact('state','district','share','mem');
        return view('transactions.memberaccount')->with($data);
    }
   
    public function getkycsuggestions(Request $request)
    {
        $query = $request->get('query'); 
        $kycSuggestions = KycAccount::where('id', 'like', '%' . $query . '%')
            ->limit(10) 
            ->get(['id']);
        
        return response()->json([
            'success' => true,
            'data' => $kycSuggestions
        ]);
    }

    public function getkycdetails(Request $request)
    {
        $kycId = $request->get('id'); 
        $kycDetails = KycAccount::find($kycId);
        
        if ($kycDetails) {
            return response()->json([
                'success' => true,
                'data' => $kycDetails
            ]);
        } else {
            return response()->json(['success' => false], 404);
        }
    }

   
    
   
    public function submitmembershipform(Request $request)
    { 
    $validated = $request->validate([
        '_token' => 'required',  
        'openingdate' => 'required|date_format:d-m-Y',  
        'kyc_no' => 'required|numeric',  
        'full_name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'state' => 'required|numeric',
        'district' => 'required|numeric',
        'pin' => 'required|numeric|digits:6', 
        'street_no' => 'required|string|max:255',
        'house_no_name' => 'required|string|max:255',
        // 'member_id' => 'required|numeric',
        'share_balance' => 'required|numeric',
        'share_type' => 'required|numeric',
        'face_value' => 'required|numeric',
        'share_qty' => 'required|numeric',
        'share_amount' => 'required|numeric',
        'application_fee' => 'required|numeric',
        'cgst_application' => 'required|numeric',
        'sgst_application' => 'required|numeric',
        'processing_fee' => 'required|numeric',
        'cgst_processing' => 'required|numeric',
        'sgst_processing' => 'required|numeric',
        'total_charges_amount' => 'required|numeric',
        'amount_received_figures' => 'required|numeric',
        'amount_received_words' => 'required|string|max:255',
        'distinctive_share_no' => 'required|numeric',
        'reference' => 'required|numeric',
        // 'remark' => 'nullable|string|max:255',
        // 'photo' => 'required|image|mimes:png,jpg,jpeg|max:1024',  
        // 'upload1' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        // 'upload2' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
    ]);
 
    if ($request->hasFile('photo')) {
        $nphotophoto = rand() . 'photoall.' . $request->file('photo')->getClientOriginalExtension();
        $rounphotophoto = $request->file('photo')->storeAs('public/featphotos', $nphotophoto);
    }else{
        $rounphotophoto="";
    }

    if ($request->hasFile('upload1')) {
        $nupload1upload1 = rand() . 'upload1all.' . $request->file('upload1')->getClientOriginalExtension();
        $rounupload1upload1 = $request->file('upload1')->storeAs('public/featupload1s', $nupload1upload1);
    }else{
        $rounupload1upload1="";
    }

    if ($request->hasFile('upload2')) {
        $nupload2upload2 = rand() . 'upload2all.' . $request->file('upload2')->getClientOriginalExtension();
        $rounupload2upload2 = $request->file('upload2')->storeAs('public/featupload2s', $nupload2upload2);
    }else{
        $rounupload2upload2="";
    }

 
    $maxMemberId = DB::table('memberid_numbers')->max('memberid_numbers')+1;
    $addmem=new memberid_numbers();
    $addmem->memberid_numbers=$maxMemberId;
    $addmem->save();

    $membership = new Membership(); 
    $membership->openingdate = date('Y-m-d', strtotime($request->openingdate)); 
    $membership->kyc_no = $request->kyc_no;
    $membership->full_name = $request->full_name;
    $membership->father_name = $request->father_name;
    $membership->state = $request->state;
    $membership->district = $request->district;
    $membership->pin = $request->pin;
    $membership->street_no = $request->street_no;
    $membership->house_no_name = $request->house_no_name;
    $membership->member_id = $maxMemberId;
    $membership->share_balance = $request->share_balance;
    $membership->share_type = $request->share_type;
    $membership->face_value = $request->face_value;
    $membership->share_qty = $request->share_qty;
    $membership->share_amount = $request->share_amount;
    $membership->application_fee = $request->application_fee;
    $membership->cgst_application = $request->cgst_application;
    $membership->sgst_application = $request->sgst_application;
    $membership->processing_fee = $request->processing_fee;
    $membership->cgst_processing = $request->cgst_processing;
    $membership->sgst_processing = $request->sgst_processing;
    $membership->total_charges_amount = $request->total_charges_amount;
    $membership->amount_received_figures = $request->amount_received_figures;
    $membership->amount_received_words = $request->amount_received_words;
    $membership->distinctive_share_no = $request->distinctive_share_no;
    $membership->reference = $request->reference;
    $membership->remark = $request->remark;
    $membership->photo = $rounphotophoto ?? null;
    $membership->upload1 = $rounupload1upload1 ?? null;
    $membership->upload2 = $rounupload2upload2 ?? null;
    
    $membership->save(); 
    return response()->json(['success' => true]);
}

}
 