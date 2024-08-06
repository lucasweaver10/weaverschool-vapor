<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <div wire:ignore>
        <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">
        <textarea class="bg-white" input="{{ $trixId }}"></textarea>

        <script>
            const easyMDE = new EasyMDE();
            easyMDE.codemirror.on("change", () => {
            @this.set('value', easyMDE.value());
            });
        </script>
    </div>
</div>
