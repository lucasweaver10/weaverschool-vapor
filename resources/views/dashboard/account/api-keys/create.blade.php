<x-layouts.app>
<x-slot name="title">
    Create API Key | {{ config('app.name') }}
</x-slot>
<x-dashboard.index :user="$user">
    <x-slot name="title">
        Get Your API Key
    </x-slot>
    <div x-data="{ activeTab: 'account'}">
    <main>        
            <h1 class="sr-only">Get an API Key</h1>
            <x-dashboard.profile.subnav />             

            <div class="flex mt-10">
                <div class="mx-auto">                    
                    <form method="POST" action="{{ url('/api-keys/generate') }}" id="api-token-creation-form" class="text-center">
                        @csrf
                        <div class="mt-8 flex">
                            <button type="submit" class="rounded-md bg-teal-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-500">Create New API Key</button>
                        </div>                        
                        <x-honeypot />
                    </form>                    
                </div>
            </div>
        
        <x-alerts.error />        
    </main>
</x-dashboard.index>
</x-layouts.app>