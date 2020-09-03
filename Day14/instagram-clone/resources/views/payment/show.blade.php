@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Billing
                    </div>
                    <div class="card-body">
                        <div class="card-title">CURRENT PLAN</div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ $subscription->plan->nickname  }}</h3>
                                <p>  {{ $subscription->plan->amount/100 . ''. $subscription->plan->currency }} Per {{ $subscription->plan->interval_count }} {{ ucfirst($subscription->plan->interval)  }} </p>
                                <p>Your Plan will be renew on {{  \Carbon\Carbon::createFromTimestamp($subscription->current_period_end)->toFormattedDateString()  }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('subscription.swap')  }}" class="btn btn-info" >Change Plan</a>
                                @if(auth()->user()->subscription('main')->onGracePeriod())
                                    <a href="{{ route('subscription.resume') }}" class="btn btn-success" >Resume Plan</a>
                                @else
                                    <a href="{{ route('subscription.cancel') }}" class="btn btn-danger" >Cancel Plan</a>
                                @endif
                            </div>
                        </div>

                        <div class="card-title mt-5">PAYMENT METHOD</div>
                        <hr />
                        <p>
                            <i class="fab fa-cc-visa"></i>
                            xxxxxxxx {{ auth()->user()->card_last_four }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
