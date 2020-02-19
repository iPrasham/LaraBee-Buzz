@component('mail::message')
{{--# Introduction--}}

Hi, {{ $user->name }} Welcome to the Larabee Buzz

We provide a great platform to:
- Create blogs to inspire and learn
- Comments on blogs

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Login here
@endcomponent

{{--to create a panel--}}
@component('mail::panel', ['url' => ''])
    Looking forward to see you creating a huge buzz in Larabee...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
