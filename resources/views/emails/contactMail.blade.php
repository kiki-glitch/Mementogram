@component('mail::message')

<b>Name</b> {{ $data['name']}} <br/>
<b>Email</b> {{ $data['email']}}<br/>
<b>Phone</b> {{ $data['phone']}}<br/>
<b>Subject</b> {{ $data['subject']}}<br/>


 {{ $data['form_message']}}<br/>

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to {{ $data['name']}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
