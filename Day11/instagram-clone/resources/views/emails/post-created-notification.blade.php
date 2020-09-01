@component('mail::message')
# Introduction
Hello one new Post created Title: {{ $mailContent->title  }}
Created By : {{ $mailContent->created_by  }}
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
