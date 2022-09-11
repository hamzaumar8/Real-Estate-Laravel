@component('mail::message')
# hi, {{$owner->title}} {{$owner->name}}
Kindly click on the link below to activate you account

@component('mail::button', ['url' => route('register',['uuid' => $owner->uuid, 'token' => $owner->token])])
Invite Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent