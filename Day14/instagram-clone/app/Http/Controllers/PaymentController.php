<?php

namespace App\Http\Controllers;

use App\User;
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

    public function mySubscription(Request $request){
        $subscription = $request->user()->asStripeCustomer()->subscriptions->first();
        return view('payment.show',['subscription'=>$subscription]);
    }

    public function swapSubscriptionPlan(Request $request){

        $currentSubscription = $request->user()->asStripeCustomer()->subscriptions->first();
        $currentPlan = $currentSubscription->plan->id;

        // Grab all the existing plan for this product/project
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $plans = collect($stripe->plans->all(['product' => 'prod_HpywI0w5CPMATZ'])->data);
        $newPlan = $plans->whereNotIn('id',$currentPlan)->first()->id;

        $request->user()->subscription('main')->swap($newPlan);

        return redirect(route('my-subscription'));

    }

    public  function cancelSubscriptionPlan(Request $request){
        $request->user()->subscription('main')->cancel();
        return redirect(route('my-subscription'));
    }

    public function resumeSubscriptionPlan(Request $request){
        if(!$request->user()->subscribed('main')){
            $request->user()->subscription('main')->resume();
            return redirect(route('my-subscription'));
        }else{
            return redirect(route('my-subscription'))->withErrors(['You already resume this plan']);
        }

    }

    public function getAllUsersSubscription(){
        $users = User::all();
        foreach ($users as $user){
            dd($user->asStripeCustomer()->subscriptions->first());
        }
    }

}
