<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">

        <div class="grid grid-cols-1 gap-5">

            <x-input label="Property Title" type="text" placeholder="Property Title" required
                wire:model.defer="title" />

            <x-textarea label="Address" placeholder="Enter Address" wire:model.defer="address" />

        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button positive type="submit" spinner="save" :label="__('Submit')" />
        </div>
    </form>
</div>