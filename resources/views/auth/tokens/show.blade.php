<x-guest-layout>
<x-slot name="title">
        Your API Token | The Weaver School
</x-slot>    
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <p class="lead text-center mb-4">Your API Token:</p>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="flex justify-center items-center w-full px-4">
            <span id="api-token" class="block max-w-full overflow-x-auto px-4 break-words cursor-pointer hover:bg-gray-200 rounded-lg p-2">{{ $token }}</span>
            <button id="copy-button" class="ml-2 p-2 hover:bg-gray-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 text-gray-500 hover:text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                </svg>
            </button>
        </div>
    </x-auth-card>
    <x-alerts.error />
</x-guest-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyButton = document.getElementById('copy-button');
    const apiTokenSpan = document.getElementById('api-token');
    const apiToken = apiTokenSpan.textContent;

    function copyToken() {
        navigator.clipboard.writeText(apiToken).then(() => {
            alert('Token copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy token: ', err);
            alert('Failed to copy token. Please try again.');
        });
    }

    // Add event listeners to both elements
    copyButton.addEventListener('click', copyToken);
    apiTokenSpan.addEventListener('click', copyToken);
});
</script>
