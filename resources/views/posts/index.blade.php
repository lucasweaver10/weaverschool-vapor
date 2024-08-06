<x-layouts.app>
<div class="p-5">
    @foreach($posts as $post)
        <a href="{{ route('posts.edit', ['id' => $post->id]) }}">
            <h2>{{ $post->title }}</h2>
        </a>
    @endforeach
</div>

</x-layouts.app>
