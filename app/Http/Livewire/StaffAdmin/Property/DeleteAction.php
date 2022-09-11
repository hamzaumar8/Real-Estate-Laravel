<?php

namespace App\Http\Livewire\Staffadmin\Property;

use App\Models\Property;
use LivewireUI\Modal\ModalComponent;

class DeleteAction extends ModalComponent
{
    public ?int $propertyId = null;

    public array $propertyIds = [];

    public string $confirmationTitle = '';

    public string $confirmationDescription = '';

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function confirm()
    {
        if ($this->propertyId) {
            Property::query()->find($this->propertyId)->delete();
        }

        if ($this->propertyIds) {
            Property::query()->whereIn('id', $this->propertyIds)->delete();
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }
    public function render()
    {
        return view('livewire.staffadmin.property.delete-action');
    }
}