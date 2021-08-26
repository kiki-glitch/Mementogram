@component('mail::message')

<b>Name</b> {{ $data['name']}} <br/>
<b>Email</b> {{ $data['email']}}<br/>
<b>Phone</b> {{ $data['phone']}}<br/>
<b>Subject</b> {{ $data['subject']}}<br/>
<b>Message</b> {{ $data['form_message']}}<br/>

The body of your message.

@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to {{ $data['name']}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
