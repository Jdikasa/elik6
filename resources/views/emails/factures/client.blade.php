@component('mail::message')

{!! $textmessage !!}

{{-- @component('mail::button', ['url' => $url])
View Order
@endcomponent --}}

<br><br>
{{ config('app.name') }}
@endcomponent
