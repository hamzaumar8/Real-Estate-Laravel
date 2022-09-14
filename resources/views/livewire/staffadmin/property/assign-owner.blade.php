<div class="p-5">
    <div class="font-semibold font-gray-700 text-lg">{{ $confirmationTitle }}</div>

    <div class="py-2">
        <form wire:submit.prevent="save">
            <div class="font-normal text-gray-600">lorem</div>
            <div>
                <x-select label="Nationality" wire:model.defer="owner" placeholder="Select a nationality" multiselect
                    :async-data="route('api.owners')" option-label="name" option-value="id" required />
                <br>
                <br>
                <br>

            </div>

            <div class="space-x-2 flex justify-end mt-3">
                <x-button
                    class="bg-gray-200 cursor-pointer text-black border border-gray-400 px-3 py-2 m-1 rounded text-sm"
                    wire:click="cancel" spinner="cancel" :label="__('Cancel')" />

                <x-button positive type="submit" class="px-3 py-2 m-1 rounded text-sm" spinner="save"
                    :label="__('Save')" />
            </div>
        </form>
    </div>
</div>