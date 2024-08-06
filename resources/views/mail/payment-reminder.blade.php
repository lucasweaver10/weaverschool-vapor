@component('mail::message')
# <div align="center">Next step: payment for your lessons</div>

Hi {{ $user->first_name ?? '' }},

Now that you've registered for your lessons, the next step is your payment. Payment is simple and easy. Just click on the "Payments" tab on the left side of your student dashboard and choose the method most convenient for you. We accept credit card, iDeal, SEPA, and company invoicing.

<strong>Subscriptions also available</strong><br>
Do you need a more flexible payment option? Go to the "Subscriptions" tab in the Payments page where you can select to have your payments broken up into separate monthly payments.

<strong>Have questions?</strong><br>
If you have any questions please email me at [lucas@weaverschool.com](mailto:lucas@weaverschool.com) and I'll be happy to help. Or, you can [schedule a quick phone call with me here](https://meetings.hubspot.com/lucas56):

<br>
<img src="{{ asset('/images/lucas_weaver.jpg') }}" style="height: 100px; width: 100px; border-radius: 50%; margin-top: 20px; margin-bottom: 20px; margin-left: 40%; margin-right: 45%;" alt="lucas weaver">

<br>
<div align="center">Thank you for choosing The Weaver School!<br></div>
<div align="center">Lucas Weaver</div>

@component('mail::button', ['url' => 'https://www.weaverschool.com/login'])
    Log in
@endcomponent

{{-- <br>
{{ config('app.name') }} --}}
@endcomponent
