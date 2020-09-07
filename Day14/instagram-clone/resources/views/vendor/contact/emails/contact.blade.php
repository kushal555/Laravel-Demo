@component('mail::message')
# Introduction
Hello,<br/>
we have a query from {{ $data['name']  }} <br/>
Query:-
    {{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
