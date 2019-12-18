@component('mail::message')
 Hello, {{$data['friend_name']}}, {{$data['your_name']}}

@component('mail::button', ['url' => $data['jobUrl']])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
