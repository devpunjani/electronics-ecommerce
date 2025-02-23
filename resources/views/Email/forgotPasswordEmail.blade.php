{{-- Command For Create Mail --}}
{{-- php artisan make:mail forgotPassword --markdown=Email.forgotPassword --}}

@component('mail::message')

<h1> Hello {{ $mailData['name'] }}</h1>
Your OTP For Forgot Password Is {{ $mailData['otp'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
