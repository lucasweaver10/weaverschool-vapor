<div>
    <form wire:submit.prevent="save">
        <label for="file" class="form-label mt-3">Add attachments:</label>
            <div class="input-group mt-1 mb-3" wire:click="upload">
                <div class="input-group-prepend">
                    <span wire:click="upload" class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" wire:model="attachments" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="attachments" multiple>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                <div wire:loading wire:target="file">Uploading...</div>
            </div>
    </form>
</div>
