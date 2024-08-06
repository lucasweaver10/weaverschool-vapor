<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn text-lg rounded-md font-semibold px-4 py-3 bg-teal-500 text-white hover:bg-teal-600']) }}>
    {{ $slot }}
</button>
