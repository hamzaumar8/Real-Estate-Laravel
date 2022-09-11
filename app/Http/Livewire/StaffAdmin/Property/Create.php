<?php

namespace App\Http\Livewire\Staffadmin\Property;

use App\Models\Property;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Create extends Component
{
    use WithFileUploads;
    use Actions;

    public $title, $house_number, $address;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'house_number' => 'nullable|max:15',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            $property = Property::create([
                'title' => $this->title,
                'address' => $this->address,
                'house_number' => $this->house_number,
            ]);

            session()->flash('success', 'Property details was successfully saved!');
            return redirect()->route('property.index');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->addError('Exception Message: ', $message);
            $this->notification()->error(
                $title = 'Error !!!',
                $description = 'Exception Message: ' . $message,
            );
        }
    }

    public function render()
    {
        return view('livewire.staffadmin.property.create');
    }
}