@component('mail::message')
# Your Transaction Has Been Confirmed

Hi {{ $checkout->Camp->name }}
<br>
Your transaction has been confirmes, now you can enjoy the benefits of <b>{{ $checkout->Camp->title }}</b> Camp.

@component('mail::button', ['url' => route("user.dashboard")])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
