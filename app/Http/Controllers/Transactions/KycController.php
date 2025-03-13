<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Models\KycAccount;
use App\Models\KYCNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KycController extends Controller
{
    public function kycindex()
    {

        $states = DB::table('state')->orderBy('state_id', 'ASC')->get();
        $kycs = DB::table('kyc_accounts')->orderBy('id', 'DESC')->get();
        $data['states'] = $states;
        $data['kycs'] = $kycs;
        return view('transactions.kyc', $data);
    }

    public function getcities(Request $post)
    {
        $rules = [
            'stateId' => 'required'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Select State']);
        }

        $stateId = $post->stateId;
        $districts = DB::table('district')->where('state_id', $stateId)->orderBy('districtid', 'ASC')->get();
        if (!empty($districts)) {
            return response()->json(['status' => 'success', 'districts' => $districts]);
        } else {
            return response()->json(['status' => 'Fail', 'messages' => 'cities Not Found']);
        }
    }

    public function kycdatainsert(Request $post)
    {
        $rules = [
            "branch" => "required",
            "membertype" => "required",
            "name" => "required",
            "dob" => "required",
            "age" => "required",
            "gender" => "required",
            "marital_status" => "required",
            "father_name" => "required",
            "mather_name" => "required",
            "spouse" => "required",
            "occupation" => "required",
            "address" => "required",
            "state" => "required",
            "district" => "required",
            "pincode" => "required",
            "street" => "required",
            "house" => "required",
            "residence" => "required",
            "mobile" => "required",
            "email" => "required",
            "idprooftype" => "required",
            "id_proof_no" => "required",
            "exdate" => "required",
            "bankname" => "required",
            "ifsc" => "required",
            "bank_branch" => "required",
            "account" => "required",
            "nomineename" => "required",
            "nomineerelation" => "required",
            "nomineeage" => "required",
            "birth" => "required",
            "remarks" => "required",
            "refrence" => "required",
            "photo" => 'nullable|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "id_front" => 'nullable|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "id_back" => 'nullable|required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Required Input']);
        }

        $kyc_number = DB::table('k_y_c_numbers')->max('kyc_number') + 1;
        $addmem = new KYCNumber();
        $addmem->kyc_number = $kyc_number;
        $addmem->save();



        if ($post->file('photo')) {
            $photo = rand() . 'photo.' . $post->file('photo')->getClientOriginalExtension();
            $rounimagephoto = $post->file('photo')->storeAs('public/photo', $photo);
        } else {
            $rounimagephoto = "";
        }

        if ($post->file('id_front')) {
            $idfront = rand() . 'idfront.' . $post->file('id_front')->getClientOriginalExtension();
            $rounimageidfront = $post->file('id_front')->storeAs('public/IdFront', $idfront);
        } else {
            $rounimageidfront =  "";
        }


        if ($post->file('id_back')) {
            $idback = rand() . 'idback.' . $post->file('id_back')->getClientOriginalExtension();
            $rounimageidback = $post->file('id_back')->storeAs('public/Idback', $idback);
        } else {
            $rounimageidback =  "";
        }


        if ($post->file('address_front')) {
            $address_front = rand() . 'addressfront.' . $post->file('address_front')->getClientOriginalExtension();
            $rounimageaddress_front = $post->file('address_front')->storeAs('public/addressfront', $address_front);
        } else {
            $rounimageaddress_front =  "";
        }


        if ($post->file('address_back')) {
            $address_back = rand() . 'address_back.' . $post->file('address_back')->getClientOriginalExtension();
            $rounimageaddress_back = $post->file('address_back')->storeAs('public/addressback', $address_back);
        } else {
            $rounimageaddress_back =  "";
        }


        if ($post->file('bank_account_proof')) {
            $bank_account_proof = rand() . 'bank_account_proof.' . $post->file('bank_account_proof')->getClientOriginalExtension();
            $rounimagebank_account_proof = $post->file('bank_account_proof')->storeAs('public/bankaccountproof', $bank_account_proof);
        } else {
            $rounimagebank_account_proof =  "";
        }

        DB::table('kyc_accounts')->insert([
            'branch' => $post->branch,
            'kyc_number' => $kyc_number,
            'membertype' => $post->membertype,
            'name' => $post->name,
            'dob' => date('Y-m-d', strtotime($post->dob)),
            'age' => $post->age,
            'gender' => $post->gender,
            'marital_status' => $post->marital_status,
            'father_name' => $post->father_name,
            'mother_name' => $post->mather_name,
            'spouse' => $post->spouse,
            'occupation' => $post->occupation,
            'education' => $post->eduction,
            'address' => $post->address,
            'state' => $post->state,
            'district' => $post->district,
            'pincode' => $post->pincode,
            'street' => $post->street,
            'house' => $post->house,
            'residence' => $post->residence,
            'additional' => $post->additional,
            'mobile' => $post->mobile,
            'email' => $post->email,
            'bankdetails' => $post->bankdetails,
            'idprooftype' => $post->idprooftype,
            'id_proof_no' => $post->id_proof_no,
            'issuedate' => date('Y-m-d', strtotime($post->issuedate)),
            'exdate' => date('Y-m-d', strtotime($post->exdate)),
            'bankname' => $post->bankname,
            'ifsc' => $post->ifsc,
            'bank_branch' => $post->bank_branch,
            'banck_account' => $post->account,
            'nomineename' => $post->nomineename,
            'nomineerelation' => $post->nomineerelation,
            'nomineeage' => $post->nomineeage,
            'nominee_birth' => date('Y-m-d', strtotime($post->birth)),
            'remarks' => $post->remarks,
            'refrence' => $post->refrence,
            "photo" => $rounimagephoto,
            "id_front" => $rounimageidfront,
            "id_back" => $rounimageidback,
            'address_front' => $rounimageaddress_front,
            'address_back' => $rounimageaddress_back,
            'bank_account_proof' => $rounimagebank_account_proof,
            'branchId' => Session::get("adminbranch"),
            'admin_id' => Session::get("adminloginid"),
            'session_id' => Session::get("adminsessionid"),
            'updatedBy' => Session::get("adminloginid"),
        ]);


        return response()->json(['status' => 'success', 'messages' => 'Record Inserted Successfully']);
    }


    public function editkyc(Request $post)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Id Not Found']);
        }

        $id = $post->id;
        $existId = DB::table('kyc_accounts')->where('id', $id)->first();

        if (is_null($existId)) {
            return response()->json(['status' => 'Fail', 'messages' => 'Record Not Found']);
        } else {
            return response()->json(['status' => 'success', 'existId' => $existId]);
        }
    }

    public function kycdataupdate(Request $post)
    {
        $rules = [
            "kycid" => 'required',
            "branch" => "required",
            "membertype" => "required",
            "name" => "required",
            "dob" => "required",
            "age" => "required",
            "gender" => "required",
            "marital_status" => "required",
            "father_name" => "required",
            "mather_name" => "required",
            "spouse" => "required",
            "occupation" => "required",
            "address" => "required",
            "state" => "required",
            "district" => "required",
            "pincode" => "required",
            "street" => "required",
            "house" => "required",
            "residence" => "required",
            "mobile" => "required",
            "email" => "required",
            "idprooftype" => "required",
            "id_proof_no" => "required",
            "exdate" => "required",
            "bankname" => "required",
            "ifsc" => "required",
            "bank_branch" => "required",
            "account" => "required",
            "nomineename" => "required",
            "nomineerelation" => "required",
            "nomineeage" => "required",
            "birth" => "required",
            "remarks" => "required",
            "refrence" => "required",
            "photo" => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "id_front" => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "id_back" => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Check All Required Input']);
        }

        $existId = KycAccount::find($post->kycid);

        if (!empty($existId)) {

            if ($post->file('photo')) {
                if ($existId->photo) {
                    Storage::delete('public/photo/' . $existId->photo);
                }

                $photo = rand() . 'photo.' . $post->file('photo')->getClientOriginalExtension();
                $rounimagephoto = $post->file('photo')->storeAs('public/photo', $photo);
            } else {
                $rounimagephoto = $existId->photo;
            }

            if ($post->file('id_front')) {
                if ($existId->id_front) {
                    Storage::delete('public/IdFront/' . $existId->id_front);
                }

                $idfront = rand() . 'idfront.' . $post->file('id_front')->getClientOriginalExtension();
                $rounimageidfront = $post->file('id_front')->storeAs('public/IdFront', $idfront);
            } else {
                $rounimageidfront = $existId->id_front;
            }


            if ($post->file('id_back')) {
                if ($existId->id_back) {
                    Storage::delete('public/Idback/' . $existId->id_back);
                }

                $idback = rand() . 'idback.' . $post->file('id_back')->getClientOriginalExtension();
                $rounimageidback = $post->file('id_back')->storeAs('public/Idback', $idback);
            } else {
                $rounimageidback = $existId->id_back;
            }


            if ($post->file('address_front')) {
                if ($existId->address_front) {
                    Storage::delete('public/addressfront/' . $existId->address_front);
                }

                $address_front = rand() . 'addressfront.' . $post->file('address_front')->getClientOriginalExtension();
                $rounimageaddress_front = $post->file('address_front')->storeAs('public/addressfront', $address_front);
            } else {
                $rounimageaddress_front =  $existId->address_front;
            }


            if ($post->file('address_back')) {
                if ($existId->address_back) {
                    Storage::delete('public/addressback/' . $existId->address_back);
                }


                $address_back = rand() . 'address_back.' . $post->file('address_back')->getClientOriginalExtension();
                $rounimageaddress_back = $post->file('address_back')->storeAs('public/addressback', $address_back);
            } else {
                $rounimageaddress_back =  $existId->address_back;
            }


            if ($post->file('bank_account_proof')) {
                if ($existId->bank_account_proof) {
                    Storage::delete('public/bankaccountproof/' . $existId->bank_account_proof);
                }

                $bank_account_proof = rand() . 'bank_account_proof.' . $post->file('bank_account_proof')->getClientOriginalExtension();
                $rounimagebank_account_proof = $post->file('bank_account_proof')->storeAs('public/bankaccountproof', $bank_account_proof);
            } else {
                $rounimagebank_account_proof = $existId->bank_account_proof;
            }

            $existId->branch = $post->branch;
            $existId->membertype = $post->membertype;
            $existId->name = $post->name;
            $existId->dob = date('Y-m-d', strtotime($post->dob));
            $existId->age = $post->age;
            $existId->gender = $post->gender;
            $existId->marital_status = $post->marital_status;
            $existId->father_name = $post->father_name;
            $existId->mother_name = $post->mather_name;
            $existId->spouse = $post->spouse;
            $existId->occupation = $post->occupation;
            $existId->education = $post->eduction;
            $existId->address = $post->address;
            $existId->state = $post->state;
            $existId->district = $post->district;
            $existId->pincode = $post->pincode;
            $existId->street = $post->street;
            $existId->house = $post->house;
            $existId->residence = $post->residence;
            $existId->additional = $post->additional;
            $existId->mobile = $post->mobile;
            $existId->email = $post->email;
            $existId->bankdetails = $post->bankdetails;
            $existId->idprooftype = $post->idprooftype;
            $existId->id_proof_no = $post->id_proof_no;
            $existId->issuedate = date('Y-m-d', strtotime($post->issuedate));
            $existId->exdate = date('Y-m-d', strtotime($post->exdate));
            $existId->bankname = $post->bankname;
            $existId->ifsc = $post->ifsc;
            $existId->bank_branch = $post->bank_branch;
            $existId->banck_account = $post->account;
            $existId->nomineename = $post->nomineename;
            $existId->nomineerelation = $post->nomineerelation;
            $existId->nomineeage = $post->nomineeage;
            $existId->nominee_birth = date('Y-m-d', strtotime($post->birth));
            $existId->remarks = $post->remarks;
            $existId->refrence = $post->refrence;
            $existId->photo = $rounimagephoto;
            $existId->id_front = $rounimageidfront;
            $existId->id_back = $rounimageidback;
            $existId->address_front = $rounimageaddress_front;
            $existId->address_back = $rounimageaddress_back;
            $existId->bank_account_proof = $rounimagebank_account_proof;
            $existId->branchId = Session::get("adminbranch");
            $existId->admin_id = Session::get("adminloginid");
            $existId->session_id = Session::get("adminsessionid");
            $existId->updatedBy = Session::get("adminloginid");
            $existId->save();

            return response()->json(['status' => 'success', 'messages' => 'Record Updated Successfully']);
        } else {
            return response()->json(['status' => 'Fail', 'messages' => 'Record Not Found']);
        }
    }


    public function deletekyc(Request $post)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($post->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'Fail', 'messages' => 'Id Not Found']);
        }

        $id = $post->id;
        $existId = DB::table('kyc_accounts')->where('id', $id)->first();

        if (is_null($existId)) {
            return response()->json(['status' => 'Fail', 'messages' => 'Record Not Found']);
        } else {

            $checkexists = DB::table('memberships')->where('kyc_no', $existId->kyc_number)->first();
            if (!empty($checkexists)) {
                return response()->json(['status' => 'Fail', 'messages' => 'KYC Number Has Members. You cannot delete it.']);
            } else {
                DB::table('kyc_accounts')->where('id', $id)->delete();
                return response()->json(['status' => 'success', 'messages' => 'Record deleted successfully.']);
            }
        }
    }
}
