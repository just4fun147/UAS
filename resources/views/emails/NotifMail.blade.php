@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>The email is a sample email for Laravel Tutorial: How to Send an Email using Laravel 8 from @component('mail::button', ['url' => $body['url']])
Verify
@endcomponent</p>

Or click this link : <a href="{{ $body['url'] }}">Verify Email</a>

 
 
Happy coding!<br>
 
Thanks,<br>
{{ config('app.name') }}<br>
Laravel Team.
@endcomponent