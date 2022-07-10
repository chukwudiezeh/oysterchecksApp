<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Unicodeveloper\Paystack\Paystack;
use Illuminate\Support\Facades\{Redirect, Validator};


class PaymentController extends Controller
{
    
    public function pay(Request $request)
    {
        $required_data = $request->only('customAmount', 'paymentMethod');
        $validator = Validator::make($required_data, [
            'customAmount' => 'bail|required|integer|gte:5000',
            'paymentMethod' => 'bail|required|string|in:card,bank_transfer'
        ])->validate();
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
}
