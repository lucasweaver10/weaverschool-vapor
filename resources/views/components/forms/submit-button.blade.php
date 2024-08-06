<button {{ $type ?  'type=' . $type : ''  }}
        {{ $livewireFunction ? 'wire:click=' . $livewireFunction : '' }}
        {{ $livewireFunction ? 'wire:keydown.enter=' . $livewireFunction : '' }}
        {{ $livewireFunction ? 'wire:loading.remove=' . $livewireFunction : ''  }}
        {{ $alpineFunction ? '@click=' . $alpineFunction : '' }}
        class="inline-flex justify-center py-3 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md
        text-white bg-blue-400 hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        wire:loading.attr="disabled" type="button">
        {{ $text }}
</button>
@if($livewireFunction)
<svg wire:loading wire:target="{{ $livewireFunction }}" class="mr-3 fill-current" width="24" height="24" viewBox="0 0 24 24">
    <path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/><path
        d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z">
        <animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path></svg>
@endif
