@component('mail::message')
# Activate your account

Thanks for registering, Please click the link below to activate your account

@component('mail::button', ['url' => route('activate_email',[
    'token' => $user->activation_token,
    'email' => $user->email
])])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
