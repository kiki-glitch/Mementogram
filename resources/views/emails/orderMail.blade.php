@component('mail::message')

<b>Name</b> {{ $checkout['name']}} <br/>
<b>Email</b> {{ $checkout['email']}}<br/>
<b>Phone</b> {{ $checkout['phone']}}<br/>
<b>Payment_Method</b> {{ $checkout['payment_method']}}<br/>
<b>Subject</b> Order Confirmation<br/>

This is an email to confirm that it was you who ordered items from our Hiquip module.If not contact us to resolve the issue.

We also like to inform you that items not returned upon agreed date will be charged extra.

Thank you for shopping with us, we hope to continue having you as our beloved customer.

Have a great day!!!

@component('mail::button', ['url' => 'mailto:gmemontogram@gmail.com'])
Reply to Mementogram
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
