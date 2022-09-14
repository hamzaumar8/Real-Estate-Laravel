<?php

namespace App\Http\Livewire\Staffadmin\Property;

use App\Models\OwnerProperty;
use Exception;
use Livewire\Component;

class UnassignOwner extends Component
{
    public $propertyId;
    public $ownerId;

    public function unassign()
    {
        try {

            OwnerProperty::query()->where('owner_id', $this->ownerId)->where('property_id', $this->propertyId)->first()->delete();

            session()->flash('success', 'Owner to this property was unassigned successfully');

            return redirect()->route('property.show', $this->propertyId);
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
        return view('livewire.staffadmin.property.unassign-owner');
    }
}