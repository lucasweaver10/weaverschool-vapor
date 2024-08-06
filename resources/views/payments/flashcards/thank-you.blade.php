<x-layouts.app>
  <x-slot name="title">
      Thank you for your payment | The Weaver School
    </x-slot>
    <x-slot name="description">
      Thank you for your payment
    </x-slot>


  <div class="mt-4">
      <div class="mb-4 text-center">
          <h1 class="text-center">Payment successful</h1>
            <p class="mt-4 mb-5">Thank you for your payment {{ $user->first_name ?? '' }}! You will receive an email with your receipt in just a few minutes.</p>
            <a role="button" href="/flashcards"
               class="mt-5 py-3 px-3 bg-blue-400 text-white rounded-lg font-normal text-2xl">Start making your flashcards</a>
      </div>
  </div>

</x-layouts.app>
