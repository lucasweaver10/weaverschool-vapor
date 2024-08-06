<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
</script>
