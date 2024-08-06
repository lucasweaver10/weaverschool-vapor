<button @click="mobileActionButtonOpen = !mobileActionButtonOpen" class="text-teal-700 hover:text-teal-900 font-bold py-2 px-3 rounded-lg transition mr-4">
    <svg x-show="!mobileActionButtonOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
    </svg>
    <svg x-cloak x-show="mobileActionButtonOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
    </svg>                
</button>