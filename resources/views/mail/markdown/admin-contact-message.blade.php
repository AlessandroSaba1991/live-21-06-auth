@component('mail::message')
# {{$message->subject}}

Hai ricevuto un nuovo messaggio da {{$message->full_name}}
Subject: {{$message->subject}}
Message:
{{$message->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
