@component('mail::message')
# Invoice
Invoice number 12345
Date of issue 10 July, 2022
Date due 25 July, 2022

The Weaver School
Stationsplein 45, A4.004
3013 AK Rotterdam
The Netherlands

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
