<div class="p-3">
    <div class="font-semibold font-gray-700 text-lg">{{ $confirmationTitle }}</div>

    <div class="py-2">
        @if($propertyId)
        PropertyId: {{ $propertyId }}
        @endif
        @if($propertyIds)
        PropertyIds: @json($propertyIds)
        @endif
        <div class="font-normal text-gray-600">{{ $confirmationDescription }}</div>
        <div class="space-x-2 flex justify-end mt-3">
            <x-button class="bg-gray-200 cursor-pointer text-black border border-gray-400 px-3 py-2 m-1 rounded text-sm"
                wire:click="cancel" spinner="cancel" :label="__('Cancel')" />
            <x-button positive class="px-3 py-2 m-1 rounded text-sm" spinner="confirm" wire:click="confirm"
                :label="__('Confirm')" />
        </div>
    </div>

</div>