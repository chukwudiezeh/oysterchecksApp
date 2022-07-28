<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\{Redirect, Validator};
use App\Models\{ActivityLog, Transaction, User, Wallet};
=======
// use Unicodeveloper\Paystack\Paystack;
use Illuminate\Support\Facades\{Redirect, Validator};
>>>>>>> 1b8580e7997c79cffc4ad952d85becccbb5989d1


class PaymentController extends Controller
{
<<<<<<< HEAD
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
=======
>>>>>>> 1b8580e7997c79cffc4ad952d85becccbb5989d1
    
    public function pay(Request $request)
    {
        $required_data = $request->only('customAmount', 'paymentMethod');
        $validator = Validator::make($required_data, [
            'customAmount' => 'bail|required|integer|gte:5000',
            'paymentMethod' => 'bail|required|string|in:card,bank_transfer'
        ])->validate();
<<<<<<< HEAD
        
        $tax = (intval($required_data['customAmount']) * 7.5)/100;
        $trans_reference = generateReference(24);
        Transaction::create([
            'user_id' => auth()->user()->id,
            'ref' => $trans_reference,
            'type' => 'credit',
            'purpose' => 'wallet top-up',
            'total_amount_payable' => intval($required_data['customAmount']) + $tax,
            'amount' => intval($required_data['customAmount']),
            'tax' => $tax,
            'status' => 'processing',
            'payment_method' => $required_data['paymentMethod']
        ]);
        
        $request->merge([
            'amount' => (intval($required_data['customAmount']) + $tax) * 100,
            'reference' => $trans_reference,
            'email' => auth()->user()->email,
            'currency' => 'NGN',
        ]);
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */

    public function handleCallback(Request $request)
    {
        $response_data = Paystack::getPaymentData();
        dd($response_data);

        //status not true return error message
        if ($response_data['status'] != true){
            session()->flash('message', $response_data['message'].',please contact support.');
            return redirect()->route('user.transactions');
        }

        if ($response_data['status'] == true  && $response_data['data']['status'] == 'success'){
            $user = User::where('email', $response_data['data']['customer']['email'])->first();
            if($user){
                $transaction = Transaction::where(['ref' => $response_data['data']['reference'], 'user_id' => $user->id])->first();
                $transaction->update(['status'=> 'success']);

                $wallet = Wallet::where('user_id', $user->id)->first();
                $wallet->book_balance = $wallet->book_balance + ($transaction->amount);
                $wallet->avail_balance = $wallet->avail_balance + ($transaction->amount);
                $wallet->save();
                
            }
            return redirect()->route('user.transactions');
        }

        //status true, create transaction, wallet activity logs
    }
=======
        // if($validator->fails()){
        //     return response()->json(['errors' => $validator->errors()], 401);
        // }

        $pay_data = [
            'amount' => intval($required_data['customAmount']) * 100,
            'reference' => generateReference(24),
            'email' => auth()->user()->email,
            'currency' => 'NGN'
        ];
        
        try{
            return Paystack()->getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) { 

            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }
>>>>>>> 1b8580e7997c79cffc4ad952d85becccbb5989d1
}
