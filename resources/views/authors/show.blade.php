<x-layouts.app>
<div class="flex flex-wrap mx-8 md:mx-16 mt-8">
    <div class="w-full md:w-1/4 lg:w-1/4 px-8 lg:px-12">
        <img src="{{ $author->image }}" class="rounded-full shadow-lg mb-2" alt="{{ $author->first_name . ' ' . $author->last_name }} author profile for the Weaver School">
    </div>
    <div class="w-full mt-4 mt-md-0 md:w-3/4 lg:w-1/2">
        {!! $author->about !!}
    </div>
</div>
</x-layouts.app>