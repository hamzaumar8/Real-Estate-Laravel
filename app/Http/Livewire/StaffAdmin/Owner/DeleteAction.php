<?php

namespace App\Http\Livewire\Staffadmin\Owner;

use App\Models\Owner;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteAction extends ModalComponent
{
    public ?int $ownerId = null;

    public array $ownerIds = [];

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
        if ($this->ownerId) {
            Owner::query()->find($this->ownerId)->delete();
        }

        if ($this->ownerIds) {
            Owner::query()->whereIn('id', $this->ownerIds)->delete();
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.staffadmin.owner.delete-action');
    }
}