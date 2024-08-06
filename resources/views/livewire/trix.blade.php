<div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<div wire:ignore>
    <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">
    <trix-editor class="bg-white" input="{{ $trixId }}"></trix-editor>

    <script>
        var trixEditor = document.getElementById("{{ $trixId }}")

        addEventListener("trix-change", function(event) {
        @this.set('value', trixEditor.getAttribute('value'))
        })
    </script>
</div>
</div>
