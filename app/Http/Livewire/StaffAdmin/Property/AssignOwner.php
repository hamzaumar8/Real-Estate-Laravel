<?php

namespace App\Http\Livewire\Staffadmin\Property;

use App\Models\OwnerProperty;
use App\Models\Property;
use Exception;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class AssignOwner extends ModalComponent
{
    use Actions;
    public ?int $propertyId = null;

    public array $propertyIds = [];

    public string $confirmationTitle = '';
    public string $routeId = '';

    public $owner;

    public static function modalMaxWidth(): string
    {
        return 'xl';
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


    protected function rules()
    {
        return [
            'owner' => 'required',
        ];
    }

    public function save()
    {
        $this->validate();

        try {

            foreach ($this->owner as $owner) {
                $ownerproperty = OwnerProperty::where('owner_id', $owner)->where('property_id', $this->propertyId)->first();
                if (!$ownerproperty) {
                    OwnerProperty::create([
                        'owner_id' => $owner,
                        'property_id' => $this->propertyId
                    ]);
                }
            }

            session()->flash('success', 'Property was assigned to owners successfully');

            if ($this->routeId === 'show') {
                return redirect()->route('property.show', $this->propertyId);
            }
            return redirect()->route('property.index');

            // $this->closeModalWithEvents([
            //     'pg:eventRefresh-default',
            // ]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->addError('Exception Message: ', $message);
            $this->notification()->error(
                'Error !!!',
                'Exception Message: ' . $message,
            );
        }
    }
    public function render()
    {
        return view('livewire.staffadmin.property.assign-owner');
    }
}