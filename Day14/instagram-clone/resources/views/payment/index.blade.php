@extends('layouts.app')

@section('header')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="subscription-plan">Choose Plan</label>
                                <select class="form-control" name="subscription-plan" id="subscription-plan">
                                    <option value="" >Select Plan</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id  }}">{{ $plan->nickname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="card-holder-name">Card Holder Name</label>
                                <input type="text" id="card-holder-name" placeholder="Enter Card Holder Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                            </div>

                            <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                                Subscribe
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        window.addEventListener('load',()=>{
            const stripe = Stripe('{{ env('STRIPE_KEY')  }}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');

            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );

                if (error) {
                   console.log(" Opps, You getting some error ",error);
                } else {

                    const plan = document.getElementById('subscription-plan').value;
                    axios.post('/subscribe-payment',{
                        payment_method :  setupIntent.payment_method,
                        plan: plan
                    })
                        .then(response => {

                        }).catch( error  => {

                        });
                    // console.log(" Your card is verified ",setupIntent.payment_method)
                }
            });
        });

    </script>
@stop
