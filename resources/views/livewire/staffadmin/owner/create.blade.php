<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">

        <div class="grid grid-cols-3 gap-5">
            <x-native-select label="Title" placeholder="Select title" :options=" [
                ['value' => 'Prof.', 'name' => 'Prof'],
                ['value' => 'Dr.', 'name' => 'Dr'],
                ['value' => 'Rev.', 'name' => 'Rev'],
                ['value' => 'Mr.', 'name' => 'Mr'],
                ['value' => 'Mrs.', 'name' => 'Mrs'],
                ['value' => 'Miss.', 'name' => 'Miss'],
                ['value' => 'Ms.', 'name' => 'Ms'],
                ]" option-label="name" option-value="value" wire:model.defer="title" required />

            <x-input label="Full Name" type="text" placeholder="Full Name" required wire:model.defer="name" />

            <x-input label="Email" type="email" placeholder="Email" required wire:model.defer="email" />

            <x-input label="TIN Number" type="text" placeholder="TIN Number" wire:model.defer="tin" required />

            <x-input label="National Identification Number" type="text" placeholder="National Identification Number" required wire:model.defer="nid" />

            <x-inputs.maskable label="Phone Number 1" mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']" placeholder="Phone Number 1" required wire:model.defer="phone1" />

            <x-inputs.maskable label="Phone Number 2 (optional)" mask="['(###) ###-####', '+# ### ###-####', '+## ## ####-####']" placeholder="Phone Number 2 (optional)" wire:model.defer="phone2" />

            <x-textarea label="Address" placeholder="Enter Address" wire:model.defer="address" />

            <div class="">
                <x-input label="Passport Picture" type="file" wire:model.defer="passport_picture" />
                @if($passport_picture)
                <div class=" mb-4">
                    <img src="{{$passport_picture->temporaryUrl()}}" class="max-h-[150px] text-center" alt="">
                </div>
                @endif
            </div>


        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button positive type="submit" spinner="save" :label="__('Submit')" />
        </div>
    </form>
</div>