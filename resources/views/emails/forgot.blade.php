@component('mail::message')
Hello{{$user->name}},

<p>We understand it happens. </p>


@component('mail::button', ['url' => url('reset/' .$user->remember_token)])
Reset Your Password
@endcomponent\


<p>In case you have any issues recoering your password, pase contact us.


Thank,<hr>
{{config('app.name')}}

@endcomponent