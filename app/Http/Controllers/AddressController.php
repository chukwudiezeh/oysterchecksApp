<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressVerification;
use App\Models\AddressVerificationDetail;
use App\Models\Verification;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Client;
use App\Traits\generateHeaderReports;
use App\Traits\GenerateRef;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\FieldInput;
use App\Models\Wallet;

class AddressController extends Controller
{
    use GenerateRef;
    use generateHeaderReports;
    //

    public function AddressIndex($slug){
        if(auth()->user()->user_type == 6)
        return redirect()->route('admin.index');
        
        $data = $this->generateAddressReport($slug);
        return view('users.address.index', $data);
    }

    public function createCandidate(Request $request, $slug){
            $slug = Verification::where('slug', decrypt($slug))->first();
                $valid = Validator::make($request->all(), [
                'first_name' => 'required|string',
                'middle_name' => 'nullable|string',
                'last_name' => 'required|string',
                'phone' => 'required|numeric',
                'email' => 'nullable|email',
                'dob' => 'nullable|date_format:"Y-m-d"',
                'image'=>'required|image|mimes:jpeg,png,jpg|max:2048' 
                ]);
                if($valid->fails()){
                    Session::flash('alert', 'error');
                    Session::flash('message', 'Some fields are missing');
                    return redirect()->back()->withErrors($valid)->withInput($request->all());
                  
                }
          //  dd($request->all());
           if(request()->file('image')){
            $image = request()->file('image');
            $name =  $image->getClientOriginalName();
            $FileName = \pathinfo($name, PATHINFO_FILENAME);
            $ext =  $image->getClientOriginalExtension();
            $time = time().$FileName;
            $dd = md5($time);
            $fileName = $dd.'.'.$ext;
            if($image->move('assets/candidates', $fileName)){
              $image = $fileName;

            }
           }

            $ref = $this->GenerateRef();
            DB::beginTransaction();
            try{
                $curl = curl_init();
                $data = [
                    "firstName" => $request->first_name,
                    "middleName" => $request->middle_name != null ? $request->middle_name : "",
                    "lastName" => $request->last_name,
                    "mobile" => $request->phone,
                    "email" => $request->email != null ? $request->email : "",
                    "dateOfBirth" => $request->dob != null ? $request->dob : "",
                    "image" => asset('assets/candidates/'.$image) 
                ];
                $datas = json_encode($data, true);
                //return $datas;
            curl_setopt_array($curl, [
              // CURLOPT_URL => "https://api.youverify.co/v2/api/addresses/candidates",
              CURLOPT_URL => "https://api.sandbox.youverify.co/v2/api/addresses/candidates",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 2180,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $datas,
              CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                // "Token: zntFmihZ.g9gQAcMzK5st9Mb71uGxqi0H6hI19t3lsNjn"
                "Token: EAgjeZKG.Hazn4C1dhxI7ehgLJjYhLvJij182Ccc0UCTS"
              ],
            ]);
            $response = curl_exec($curl);
            $res = json_decode($response, true);
            if($res['success'] == true && $res['statusCode'] == 201){
                $service_ref = $res['data']['id'];
                AddressVerification::create([
                'verification_id' => $slug->id,
                'ref' => $ref,
                'user_id' => auth()->user()->id,
                'status' => 'pending',
                'service_reference' => $service_ref,
                'first_name' => $request->first_name,
                "middle_name" => $request->middle_name != null ? $request->middle_name : "",
                'last_name' => $request->last_name,
                "phone" => $request->phone,
                "email" => $request->email != null ? $request->email : "",
                "dob" => $request->dob != null ? $request->dob : "",
                "image" => asset('assets/candidates/'.$image)
                ]);
              // return $res;
              $data = $this->generateAddressReportVerify($slug);
              $data['service_ref'] = $service_ref;
                DB::commit();
                Session::flash('alert', 'success');
                Session::flash('message', 'Candidate Created Successfully');
                return view('users.address.verifyAddress', $data);
            }
            }catch(\Exception $e){
            DB::rollBack();
            throw $e;
            }
    }

    public function submitAddressVerify(Request $request, $service_ref){
        if(!isset($service_ref)){
            Session::flash('alert', 'error');
            Session::flash('message', 'Bad payload, reload page');
            return redirect()->back();
        }
        
        if($get_address_verification = AddressVerification::where('service_reference', $service_ref)->first()){
          $get_address_verification_id = $get_address_verification->id;
        }

       //$logo =  Client::first();
      //  $logo_image = base64_encode(asset('/images/logo.png'));
       if($request->slug == 'individual_address'){
        $valid = Validator::make($request->all(), [
          'flat_number' => 'nullable|string',
          'building_name' => 'nullable|string',
          'building_number' => 'required|string',
          'landmark' => 'required|string',
          'street' => 'required|string',
          'sub_street' => 'nullable|string',
          'state'=>'required|string',
          'city'=>'required|string',
          'lga'=>'nullable|string',
          'subject_consent'=>'required|accepted'
          ]);
          if($valid->fails()){
              Session::flash('alert', 'error');
              Session::flash('message', 'Some fields are missing');
              return redirect()->back()->withErrors($valid)->withInput($request->all());
            
          }

            $host = 'https://api.sandbox.youverify.co/v2/api/addresses/individual/request';
            $data = [
                "candidateId" => $service_ref,
                "description" => "Verify the candidate",
                "address" => [
                    "flatNumber" => $request->flat_number != null ? $request->flat_number : "",
                    "buildingName" => $request->building_name != null ? $request->building_name : "",
                    "buildingNumber" => $request->building_number,
                    "landmark" => $request->landmark,
                    "street" => $request->street,
                    "subStreet" => $request->sub_street != null ? $request->sub_street : "",
                    "state" => $request->state,
                    "city" => $request->city,
                    "lga" => $request->lga != null ? $request->lga : "",
                ],
                "subjectConsent"=> $request->subject_consent ? true : false,
               
            ];
       }elseif($request->slug == 'reference_address'){
          $valid = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'flat_number' => 'nullable|string',
            'building_name' => 'nullable|string',
            'building_number' => 'required|string',
            'landmark' => 'required|string',
            'street' => 'required|string',
            'sub_street' => 'nullable|string',
            'state'=>'required|string',
            'city'=>'required|string',
            'lga'=>'nullable|string',
            'subject_consent'=>'required'
          ]);
          if($valid->fails()){
            Session::flash('alert', 'error');
            Session::flash('message', 'Some fields are missing');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
            
          }
          if(request()->file('image')){
            $image = request()->file('image');
            $name =  $image->getClientOriginalName();
            $FileName = \pathinfo($name, PATHINFO_FILENAME);
            $ext =  $image->getClientOriginalExtension();
            $time = time().$FileName;
            $dd = md5($time);
            $fileName = $dd.'.'.$ext;
            if($image->move('assets/guarantors', $fileName)){
              $image = $fileName;

            }
           }

          $host = 'https://api.sandbox.youverify.co/v2/api/addresses/guarantor/request';
          $data = [
            "candidateId" => $service_ref,
            "description" => "Verify the candidtate guarantor",
            "guarantor" => [
              "firstName" => $request->first_name,
              'lastName' => $request->last_name,
              'mobile' => $request->phone,
              'email' => $request->email,
              'image' =>  asset('assets/guarantors'.$image),
            ], 
            "address" => [
              "flatNumber" => $request->flat_number != null ? $request->flat_number : "",
              "buildingName" => $request->building_name != null ? $request->building_name : "",
              "buildingNumber" => $request->building_number,
              "landmark" => $request->landmark,
              "street" => $request->street,
              "subStreet" => $request->sub_street != null ? $request->sub_street : "",
              "state" => $request->state,
              "city" => $request->city,
              "lga" => $request->lga != null ? $request->lga : "",
            ],
            "subjectConsent"=> $request->subject_consent,
          ];
       }else{
          $host = 'https://api.sandbox.youverify.co/v2/api/addresses/business/request';
          $data = [
            "candidateId" => $service_ref,
            "description" => "Verify the candidate and business",
            "business" => [
              "name" => $request->name,
              "email" => $request->email,
              "mobile" => $request->phone,
              "registrationNumber" => $request->registration_number,
            ], 
            "address" => [
              "flatNumber" => $request->flat_number != null ? $request->flat_number : "",
              "buildingName" => $request->building_name != null ? $request->building_name : "",
              "buildingNumber" => $request->building_number,
              "landmark" => $request->landmark,
              "street" => $request->street,
              "subStreet" => $request->sub_street != null ? $request->sub_street : "",
              "state" => $request->state,
              "city" => $request->city,
              "lga" => $request->local_govt != null ? $request->local_govt : "",
            ],
            "subjectConsent"=> $request->subject_consent,
          ];
       }
       DB::beginTransaction();
       try{
         $curl = curl_init();
         $datas = json_encode($data, true);
        // dd($datas);

         curl_setopt_array($curl, [
          CURLOPT_URL => $host,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 2180,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $datas,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            // "Token: zntFmihZ.g9gQAcMzK5st9Mb71uGxqi0H6hI19t3lsNjn"
            "Token: EAgjeZKG.Hazn4C1dhxI7ehgLJjYhLvJij182Ccc0UCTS"
          ],
        ]);
        
        $response = curl_exec($curl);
        $res = json_decode($response, true);

        if($res['success'] == true && $res['statusCode'] == 201){
          // dd($res);
          AddressVerificationDetail::create([
            'address_verification_id' => $get_address_verification_id,
            'reference_id' => $res['data']['referenceId'],
            'candidate' => json_encode($res['data']['candidate']),
            'guarantor' => $res['data']['guarantor'] ? json_encode($res['data']['guarantor']) : "",
            'business' => $res['data']['business'] ? json_encode($res['data']['business']) : "",
            'agent' => json_encode($res['data']['agent']),
            'address' => json_encode($res['data']['address']),
            'status' => $res['data']['status'],
            'task_status' => $res['data']['taskStatus'],
            'subject_consent' => $res['data']['subjectConsent'],
            'start_date' => $res['data']['startDate'],
            'end_date' => $res['data']['endDate'],
            'submitted_at' => $res['data']['submittedAt'],
            'execution_date' => $res['data']['executionDate'],
            'completed_at' => $res['data']['completedAt'],
            'accepted_at' => $res['data']['acceptedAt'],
            'revalidation_date'=> $res['data']['revalidationDate'],
            'notes'=> json_encode($res['data']['notes']),
            'is_flagged'=> $res['data']['isFlagged'],
            'agent_submitted_longitude' => $res['data']['agentSubmittedLongitude'],
            'agent_submitted_latitude' => $res['data']['agentSubmittedLatitude'],
            'report_geolocation_url' => $res['data']['reportGeolocationUrl'],
            'map_address_url' => $res['data']['mapAddressUrl'],
            'submission_distance_in_meters'=> $res['data']['submissionDistanceInMeters'],
            'reasons' => $res['data']['reasons'],
            'signature' => $res['data']['signature'],
            'images' => json_encode($res['data']['images']),
            'building_type' => $res['data']['buildingType'],
            'building_color' => $res['data']['buildingColor'],
            'gate_present' => $res['data']['gatePresent'],
            'gate_color' => $res['data']['gateColor'],
            'availability_confirmed_by' => $res['data']['availabilityConfirmedBy'],
            'closest_landmark' => $res['data']['closestLandmark'],
            'additional_info'=> $res['data']['additionalInfo'],
            'report_agent_access' => $res['data']['reportAgentAccess'],
            'incident_report' => $res['data']['incidentReport'],
            'description' => $res['data']['description'],
            'report_id' => $res['data']['reportId'],
            'download_url' => $res['data']['downloadUrl'],
            'business_type' => $res['data']['businessType'],
            'business_id' => $res['data']['businessId'],
            'yv_user_id' => $res['data']['userId'],
            'type' => $res['data']['type'],
            'yv_id' => $res['data']['id'],
            'links' => json_encode($res['links']),
          ]);
          DB::commit();
          Session::flash('alert', 'success');
          Session::flash('message', 'Address submitted for verification');
          return back();
        }

       }catch(\Exception $e){
          DB::rollBack();
          throw $e;
       }
  }
}
