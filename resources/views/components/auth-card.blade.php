<div class="min-h-screen flex flex-col sm:justify-center items-center pt-5 pb-10 sm:pt-0 bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-5 bg-gray-100 shadow-sm sm:shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
