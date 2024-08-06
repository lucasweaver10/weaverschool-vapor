<div class="rounded-md border b-1 border-gray-300 shadow-sm pt-3 pb-5 px-4">
    <h4 class="mt-2 mb-3">Add completed hours</h4>
        <div class="border-t border-gray-200">
            <div class="pt-4">
                <label for="lesson_hours" class="form-label">Additional lesson hours completed:</label>
                <input wire:model.live="lessonHours" class="form-control" id="lesson_hours" type="text" style="width: 20rem;">
                <button wire:click="addHours" class="btn btn-lg btn-primary mt-3">Add hours</button>
            </div>
        </div>
</div>
<x-alerts.success>
</x-alerts.success>
