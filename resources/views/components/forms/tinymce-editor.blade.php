<div>
    <form method="post">
        @csrf
        <textarea name="{{ $name }}" id="myeditorinstance">{{ old($name, $content ?? '') }}</textarea>
    </form>
</div>
