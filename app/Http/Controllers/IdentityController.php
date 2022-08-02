<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Session, Validator, DB};
use App\Traits\GenerateRef;
use App\Models\Transaction;
use App\Models\FieldInput;
use \Illuminate\Support\Arr;
use App\Models\ApiResponse;
use App\Models\{BvnVerification,NipVerification};
use Illuminate\Support\Facades\Storage;
use App\Traits\generateHeaderReports;
use App\Models\IdentityVerification;
use App\Models\Verification;
use App\Models\IdentityVerificationDetail;
use App\Models\Wallet;
use App\Models\User;
use Carbon\Carbon;

class IdentityController extends Controller
{
    use GenerateRef;
    use GenerateHeaderReports;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //  return $this->user = auth()->user();
    }

    public function RedirectUser()
    {
        if (auth()->user()->user_type == 3)
            return redirect()->route('admin.index');
    }

    public function identityIndex($slug)
    {
        $this->RedirectUser();
        $user = auth()->user();
        // $slug = strtoupper($slug);
        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        if ($slug) {
            if ($slug->slug == 'bvn') {
                $data['success'] = BvnVerification::where(['status' => 'found', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['failed'] = BvnVerification::where(['status' => 'not_found', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['pending'] = BvnVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['wallet'] = Wallet::where('user_id', $user->id)->first();           
                $data['logs'] = BvnVerification::where(['user_id' => $user->id, 'verification_id' => $slug->id])->latest()->get();
                // dd($data['logs']);
                return view('users.individual.identity_indexes.bvn_index', $data);
            } elseif ($slug->slug == 'nip') {
                $data['success'] = NipVerification::where(['status' => 'found', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['failed'] =  NipVerification::where(['status' => 'not_found', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['pending'] = NipVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->count();
                $data['wallet'] = Wallet::where('user_id', $user->id)->first();           
                $data['logs'] = NipVerification::where(['user_id' => $user->id, 'verification_id' => $slug->id])->latest()->get();
                // dd($data['logs']);
                return view('users.individual.identity_indexes.nip_index', $data);
                // $this->processNip($request);
            } elseif ($slug->slug == 'nin') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'pvc') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'ndl') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'compare-images') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'bank-account') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'phone-number') {
                // $this->processNip($request);
            }
        } else {

        }

        $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
        $data['wallet'] = Wallet::where('user_id', $user->id)->first();
        // $data['verified'] = IdentityVerificationDetail::where(['user_id'=>$user->id])->latest()->first();           
        $data['logs'] = IdentityVerification::where(['user_id' => $user->id, 'verification_id' => $slug->id])->latest()->get();
        return view('users.individual.identityIndex', $data);
    }

    public function showIdentityVerificationForm($slug)
    {
        $this->RedirectUser();
        $user = auth()->user();

        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        // $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        // $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        // $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
        // $data['wallet'] = Wallet::where('user_id', $user->id)->first();

        return view('users.individual.identityVerify', $data);
    }

    public function StoreVerify(Request $request, $slug)
    {
        $this->RedirectUser();
        $slug = Verification::where('slug', $slug)->first();

        if ($slug) {
            if ($slug->slug == 'bvn') {
                return $this->processBvn($request, $slug);
            } elseif ($slug->slug == 'nip') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'nin') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'pvc') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'ndl') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'compare-images') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'bank-account') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'phone-number') {
                // $this->processNip($request);
            }
        } else {

        }
        // $ref = $this->GenerateRef();
        // $userWallet = Wallet::where('user_id', auth()->user()->id)->first();

        // $createVerify =  IdentityVerification::create([
        //     'verification_id' => $slug->id,
        //     'ref' => $ref,
        //     'pin' => $request->pin,
        //     'user_id' => auth()->user()->id,
        //     'fee' => $slug->fee,
        //     'discount' => $slug->discount,
        //     'status' => 'pending'
        // ]);

        // if ($createVerify) {
        //     if (isset($slug->discount) && $slug->discount > 0) {
        //         $amount = ($slug->discount * $slug->fee) / 100;
        //     } else {
        //         $amount = $slug->fee;
        //     }

        //     if ($userWallet->avail_balance < $amount) {
        //         Session::flash('alert', 'error');
        //         Session::flash('message', 'Your wallet is too low for this transaction');
        //         return back();
        //     } else {
        //         $this->chargeUser($amount, $ref, $slug->report_type);
        //     }
        // }







        //check if the reference exist on the local data
        // $res = IdentityVerificationDetail::where(['reference' => $request->reference, 'slug' => $slug->slug])->where('expires_at', '>=', now())->latest()->first();
        //  dd($res);
        // sleep(5);
        // if (!$res) {
        //     IdentityVerification::where(['user_id' => auth()->user()->id])->latest()->first()
        //         ->update(['status' => 'successful']);
        //     $data = $this->generateIdentityReport($slug);
        //     Session::flash('alert', 'success');
        //     Session::flash('message', $slug->slug . ' Verification Completed Successfully');
        //     return view('users.individual.identityVerify', $data)->with('verified', $res);
        // } else {
        //     $res =  $this->getIdentityVerify($request, $slug, $request->reference);
        //     //   return $res;
        //     if ($res['message'] == 'Successful') {
        //         IdentityVerification::where(['user_id' => auth()->user()->id])->latest()->first()
        //             ->update(['status' => 'successful']);
        //         $data = $this->generateIdentityReport($slug);
        //         //  $data['res'] = $res;
        //         //  dd($data);
        //         Session::flash('alert', 'success');
        //         Session::flash('message', $slug->slug . ' Verification Completed Successfully');
        //         return view('users.individual.identityVerify', $data);
        //     } else {
        //         $this->RefundUser($amount, $ref, $slug->report_type);
        //         Session::flash('alert', 'error');
        //         Session::flash('message', 'Verification failed, please confirm input');
        //         return redirect()->back();
        //     }
        // }
    }

    public function chargeUser($amount, $ext_ref, $type)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $newWallet = $user->wallet->avail_balance - $amount;
        Wallet::where('user_id', $user->id)
            ->update([
                'prev_balance' => $wallet->avail_balance,
                'avail_balance' => $newWallet,
                'avail_balance' => $newWallet,
            ]);
        $refs = $this->GenerateRef();
        Transaction::create([
            'ref' => $refs,
            'user_id' => $user->id,
            'external_ref' => $ext_ref,
            'purpose' => 'Payment for ' . $type,
            'service_type' => $type,
            'type'  => 'DEBIT',
            'amount' => $amount,
            'prev_balance' => $wallet->avail_balance,
            'avail_balance' => $newWallet
        ]);
    }

    public function RefundUser($amount, $ext_ref, $type)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $newWallet = $user->wallet->avail_balance + $amount;
        Wallet::where('user_id', $user->id)
            ->update([
                'prev_balance' => $wallet->avail_balance,
                'avail_balance' => $newWallet,
            ]);
        $refs = $this->GenerateRef();
        Transaction::create([
            'ref' => $refs,
            'user_id' => $user->id,
            'external_ref' => $ext_ref,
            'purpose' => 'Payment for ' . $type,
            'service_type' => $type,
            'type'  => 'CREDIT',
            'amount' => $amount,
            'prev_balance' => $wallet->avail_balance,
            'avail_balance' => $newWallet
        ]);
    }

    public function getIdentityVerify($request, $slug, $reference)
    {
        $this->RedirectUser();
        $identity = IdentityVerification::where('user_id', auth()->user()->id)->latest()->first();
        $curl = curl_init();
        $data = [
            "report_type" => "identity",
            "type" => $slug->report_type,
            "reference" => $request['reference'],
            "last_name" => $request['last_name'],
            "first_name" => $request['first_name'],
            "dob" => null,
            "subject_consent" => true,
        ];
        $datas = json_encode($data, true);
        //return $datas;
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.youverify.co/v1/identities/candidates/check",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 2180,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $datas,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Token: 49c11a7ef799f5695c943ba4d3d1ddcc"
            ],
        ]);
        $response = curl_exec($curl);
        $res = json_decode($response, true);

        //  return $res;
        if ($res['status_code'] == 200) {
            if (isset($res['data']['response']['gender'])) {
                $gender = $res['data']['response']['gender'];
            } else {
                $gender = null;
            }
            if (isset($res['data']['response']['issued_date'])) {
                $issue_date = $res['data']['response']['issued_date'];
            } else {
                $issue_date = null;
            }
            if (isset($res['data']['response']['expiry_date'])) {
                $expiry_date = $res['data']['response']['expiry_date'];
            } else {
                $expiry_date  = null;
            }
            if (isset($res['data']['response']['educational_level'])) {
                $educational_level = $res['data']['response']['educational_level'];
            } else {
                $educational_level = null;
            }

            if (isset($res['data']['response']['marital_status'])) {
                $marital_status = $res['data']['response']['marital_status'];
            } else {
                $marital_status = null;
            }
            if (isset($res['data']['response']['expiry_date'])) {
                $expiry_date = $res['data']['response']['expiry_date'];
            } else {
                $expiry_date = null;
            }
            if (isset($res['data']['response']['issued_at'])) {
                $place_of_issue = $res['data']['response']['issued_at'];
            } else {
                $place_of_issue = null;
            }
            if (isset($res['data']['response']['birth_country'])) {
                $country = $res['data']['response']['birth_country'];
            } else {
                $country = null;
            }
            if (isset($res['data']['response']['document_number'])) {
                $document_number = $res['data']['response']['document_number'];
            } else {
                $document_number = null;
            }
            if (isset($res['data']['response']['residence_address_line1'])) {
                $address = $res['data']['response']['residence_address_line1'];
            } else {
                $address = null;
            }
            if (isset($res['data']['response']['profession'])) {
                $profession = $res['data']['response']['profession'];
            } else {
                $profession = null;
            }
            if (isset($res['data']['response']['birth_state'])) {
                $birth_state = $res['data']['response']['birth_state'];
            } else {
                $birth_state = null;
            }
            if (isset($res['data']['response']['residence_state'])) {
                $residence_state = $res['data']['response']['residence_state'];
            } else {
                $residence_state = null;
            }
            if (isset($res['data']['response']['first_name'])) {
                $fullname = $res['data']['response']['first_name'];
            } else {
                $fullname = $res['data']['response']['full_name'];
            }
            if (isset($res['data']['response']['middle_name'])) {
                $middle_name = $res['data']['response']['middle_name'];
            } else {
                $middle_name = null;
            }
            if (isset($res['data']['response']['last_name'])) {
                $last_name = $res['data']['response']['last_name'];
            } else {
                $last_name = null;
            }
            if (isset($res['data']['response']['dob'])) {
                $dob = $res['data']['response']['dob'];
            } else {
                $dob = null;
            }
            if (isset($res['data']['response']['mobile'])) {
                $phone = $res['data']['response']['mobile'];
            } else {
                $phone = null;
            }
            if (isset($res['data']['response']['tracking_id'])) {
                $tracking_id = $res['data']['response']['tracking_id'];
            } else {
                $tracking_id = null;
            }
            if (isset($res['data']['response']['tax_identification_number'])) {
                $tax_identification_number = $res['data']['response']['tax_identification_number'];
            } else {
                $tax_identification_number = null;
            }
            if (isset($res['data']['response']['first_state_of_issuance'])) {
                $first_state_of_issuance = $res['data']['response']['first_state_of_issuance'];
            } else {
                $first_state_of_issuance  = null;
            }
            $payload = json_encode($res['data']['response']);
            if (isset($res['data']['response']['photo'])) {
                $image = $res['data']['response']['photo']; // image base64 encoded
                $file = base64_decode($image);
                $safeName = time() . '.' . 'png';
                file_put_contents('assets/profile/' . $safeName, $file);
            } else {
                $safeName = 'image.png';
            }

            IdentityVerificationDetail::create([
                'identity_verification_id' => $identity->id,
                'external_ref' => $res['data']['reference_id'],
                'first_name' => $fullname,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'dob' => $dob,
                'phone' => $phone,
                'reference' => $reference,
                'image_path' => $image,
                'slug' => $slug->slug,
                'user_id' => auth()->user()->id,
                'expires_at' => Carbon::now()->addDay(30),
                'payload' => $payload,
                'place_of_issue' => $place_of_issue,
                'issue_date' => $issue_date,
                'expiry_date' => $expiry_date,
                'country' => $country,
                'educational_level' => $educational_level,
                'marital_status' => $marital_status,
                'gender' => $gender,
                'document_number' => $document_number,
                'address' => $address,
                'profession' => $profession,
                'birth_state' => $birth_state,
                'residence_state' => $residence_state,
                'tracking_id' => $tracking_id,
                'tax_identification_number' => $tax_identification_number,
                'first_state_of_issuance' => $first_state_of_issuance
            ]);
            return $res;
        }
        return $res;
    }

    public function test()
    {
        $check = IdentityVerificationDetail::where(['first_name' => 'IBIYEMI'])->latest()->first();
        $file = base64_decode($check->image_path);
        $safeName = time() . '.' . 'jpg';
        $success = file_put_contents('C:\xampp\htdocs\oystercheck\assets/' . $safeName, $file);
        $dd = IdentityVerificationDetail::get();
        foreach ($dd as $mm) {
            IdentityVerificationDetail::where('id', $mm->id)
                ->update(['reference' => '66894827060']);
        }
        print $success;
    }

    public function verifyDetails($id)
    {
        $this->RedirectUser();
        $slug = IdentityVerification::where('id', decrypt($id))->first();
        $user = User::where('id', auth()->user()->id)->first();
        $data['slug'] = IdentityVerification::where('id', decrypt($id))->first();
        $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->verification_id, 'user_id' => $user->id])->get();
        $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->verification_id, 'user_id' => $user->id])->get();
        $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->verification_id, 'user_id' => $user->id])->get();
        $data['logs'] = IdentityVerification::where(['user_id' => $user->id, 'verification_id' => $slug->verification_id])->latest()->get();
        $data['verified'] = IdentityVerificationDetail::where(['reference' => $slug->service_reference])->latest()->first();
        return view('users.individual.identitydetails', $data);
    }

    public function IdentitySort(Request $request, $slug)
    {

        $user = User::where('id', auth()->user()->id)->first();
        $slug = Verification::where('slug', $slug)->first();
        if ($request->sort == 'success') {
            $data['slug'] = Verification::where('slug', $slug->slug)->first();
            $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
            $data['wallet'] = Wallet::where('user_id', $user->id)->first();
            $data['logs'] = IdentityVerification::where(['user_id' => auth()->user()->id, 'status' => 'successful'])->get();
        }
        if ($request->sort == 'failed') {
            $data['slug'] = Verification::where('slug', $slug->slug)->first();
            $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
            $data['wallet'] = Wallet::where('user_id', $user->id)->first();
            $data['logs'] = IdentityVerification::where(['user_id' => auth()->user()->id, 'status' => 'failed'])->get();
        }
        if ($request->sort == 'pending') {
            $data['slug'] = Verification::where('slug', $slug->slug)->first();
            $data['success'] = IdentityVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['failed'] = IdentityVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['pending'] = IdentityVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
            $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
            $data['wallet'] = Wallet::where('user_id', $user->id)->first();
            $data['logs'] = IdentityVerification::where(['user_id' => auth()->user()->id, 'status' => 'pending'])->get();
        }
        return view('users.individual.identityVerify', $data);
    }

    protected function processBvn(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'pin' => 'bail|required|alpha_num|size:11',
            'first_name' => 'bail|nullable|string|alpha',
            'last_name' => 'bail|nullable|string|alpha',
            'validate_data' => 'bail|nullable|required_with:first_name,dob',
            'compare_image' => 'bail|nullable|required_with:image',
            'dob' => 'bail|nullable|date',
            'image' => 'bail|nullable|image|mimes:jpg,jpeg,png',
            'advance_search' => 'bail|nullable',
            'subject_consent' => 'bail|required|accepted'
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'error');
            Session::flash('msg', 'Failed! There was some errors in your input');
            return redirect()->back();
        }

        $ref = $this->GenerateRef();
        $userWallet = Wallet::where('user_id', auth()->user()->id)->first();
        $requestData = [
            'id' => $request->pin,
            'isSubjectConsent' => $request->subject_consent ? true : false,
        ];

        if ($request->validate_data) {
            $data = [];
            $request->first_name != null ? $data['firstName'] = $request->first_name : null;
            $request->last_name != null ? $data['lastName'] = $request->last_name : null;
            $request->dob != null ? $data['dateOfBirth'] = $request->dob : null;
            $requestData['validations']['data'] = $data;
        }
        if ($request->compare_image) {
            $selfie = [];
            if ($request->file('image')) {
                $image_url = cloudinary()->upload($request->file('image')->getRealPath(), [
                    'folder' => 'oysterchecks/identityVerifications/bvn'
                ])->getSecurePath();
                if ($image_url) {
                    $selfie['image'] = $image_url;
                    $requestData['validations']['selfie'] = $selfie;
                }
            }
        }
        if ($request->advance_search) {
            $should_retrieve_nin = true;
            $requestData['shouldRetrivedNin'] = $should_retrieve_nin;
        }

        DB::beginTransaction();
        try {
            $curl = curl_init();
            $encodedRequestData = json_encode($requestData, true);
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.sandbox.youverify.co/v2/api/identity/ng/bvn",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 1,
                CURLOPT_TIMEOUT => 2180,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $encodedRequestData,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "Token: N0R9AJ4L.PWYaM5cXggThkdCtkVSCsWz4fMsfeMIp6CKL"
                ],
            ]);

            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                dd('error:' . curl_errno($curl));
            } else {
                $decodedResponse = json_decode($response, true);
                // dd($decodedResponse);
                if ($decodedResponse['success'] == true && $decodedResponse['statusCode'] == 200) {
                    if ($decodedResponse['data']['image'] != null) {
                        $response_image = cloudinary()->upload($decodedResponse['data']['image'], [
                            'folder' => 'oysterchecks/identityVerifications/bvn'
                        ])->getSecurePath();
                    }
                    BvnVerification::create([
                        'verification_id' => $slug->id,
                        'user_id' => auth()->user()->id,
                        'ref' => $ref,
                        'service_reference' => $decodedResponse['data']['id'] != null ? $decodedResponse['data']['id'] : null,
                        'validations' => $decodedResponse['data']['validations'] != null ? $decodedResponse['data']['validations'] : null,
                        'status' => $decodedResponse['data']['status'],
                        'reason' => $decodedResponse['data']['reason'] != null ? $decodedResponse['data']['reason'] : null,
                        'data_validation' => $decodedResponse['data']['dataValidation'],
                        'selfie_validation' => $decodedResponse['data']['selfieValidation'],
                        'first_name' => $decodedResponse['data']['firstName'] != null ? $decodedResponse['data']['firstName'] : null,
                        'middle_name' => $decodedResponse['data']['middleName'] != null ? $decodedResponse['data']['middleName'] : null,
                        'last_name' => $decodedResponse['data']['lastName'] != null ? $decodedResponse['data']['lastName'] : null,
                        'image' => $decodedResponse['data']['image'] != null ? $response_image : null,
                        'enrollment_branch' => $decodedResponse['data']['enrollmentBranch'] != null ? $decodedResponse['data']['enrollmentBranch'] : null,
                        'enrollment_institution' => $decodedResponse['data']['enrollmentInstitution'] != null ? $decodedResponse['data']['enrollmentInstitution'] : null,
                        'phone' => $decodedResponse['data']['mobile'] != null ? $decodedResponse['data']['mobile'] : null,
                        'dob' => $decodedResponse['data']['dateOfBirth'] != null ? $decodedResponse['data']['dateOfBirth'] : null,
                        'subject_consent' => true,
                        'pin' => $request->pin,
                        'should_retrieve_nin' => $decodedResponse['data']['shouldRetrivedNin'],
                        'type' => 'bvn',
                        'gender' => $decodedResponse['data']['gender'] != null ? $decodedResponse['data']['gender'] : null,
                        'country' => 'Nigeria',
                        'requested_at' => $decodedResponse['data']['requestedAt'] != null ? $decodedResponse['data']['requestedAt'] : null,
                        'last_modified_at' => $decodedResponse['data']['lastModifiedAt'] != null ? $decodedResponse['data']['lastModifiedAt'] : null,
                    ]);

                    DB::commit();
                    Session::flash('alert', 'success');
                    Session::flash('message', 'Verification Successful');
                    return redirect()->route('identityIndex', $slug->slug);
                }else{

                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // protected function validator(array $data, $slug)
    // {
    //     return Validator::make($data, [
    //         'reference' => 'bail|required|alpha_num',
    //         'first_name' => 'bail|nullable|string|alpha',
    //         'last_name' => $slug == 'nip' ? 'bail|required|string|alpha' : 'bail|nullable|string|alpha',
    //         'validate_data' => 'bail|nullable|accepted|required_with:first_name,dob',
    //         'compare_image' => 'bail|nullable|accepted|required_with:image',
    //         'dob' => 'bail|nullable|date',
    //         'image' => 'bail|nullable|image|mimes:jpg,jpeg,png',
    //         'advance_search' => 'bail|nullable|accepted'
    //     ]);
    // }


    public function verificationReport($slug, $verificationId)
    {
        $this->RedirectUser();
        $user = auth()->user();
        // $slug = strtoupper($slug);
        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        if ($slug) {
            if ($slug->slug == 'bvn') {
                $bvn_verification = BvnVerification::where(['id'=>$verificationId, 'user_id'=>$user->id])->first();
                if($bvn_verification){
                    // dd($bvn_verification);
                    return view('users.individual.identity_reports.bvn_report', ['bvn_verification'=>$bvn_verification]);
                }
            } elseif ($slug->slug == 'nip') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'nin') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'pvc') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'ndl') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'compare-images') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'bank-account') {
                // $this->processNip($request);
            } elseif ($slug->slug == 'phone-number') {
                // $this->processNip($request);
            }
        } else {

        }
    }
}
