@component('mail::message')
# {{ $mailData['title'] }}
You Had Registered Successfully In LIGHTEN Store, <br>
Enjoy Your Shopping
@component('mail::button',['url'=>$mailData['url']])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
