<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $plans = $stripe->plans->all(['product' => 'prod_HpywI0w5CPMATZ']);
        $user = auth()->user();
        return view('payment.index',[
            'intent' => $user->createSetupIntent(),
            'plans' => $plans->data
        ]);
    }

    public function subscribe(Request $request){

        try{
            $user  = auth()->user();
            $paymentMethod = $request->payment_method;
            $plan = $request->plan;
            if($user->subscribed('main',$plan)){
                return ['status' => true,'response' => 'You already have the subscription'];
            }else{
                $response  = $user->newSubscription('main', $plan)->create($paymentMethod);
                return ['status' => true,'response' => $response];
            }

        }
        catch(\Exception $exception){
            return ['status'=> false, 'message' => $exception->getMessage()];
        }
    }

}
