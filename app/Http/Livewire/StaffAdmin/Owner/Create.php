<?php

namespace App\Http\Livewire\Staffadmin\Owner;

use App\Mail\OwnerInvite;
use App\Models\Invite;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;
use Illuminate\Support\Facades\Mail;
use WireUi\Traits\Actions;

class Create extends Component
{
    use WithFileUploads;
    use Actions;

    public $title, $name, $email, $phone1, $phone2, $address, $passport_picture, $tin, $nid;

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'phone1' => 'required|max:15',
            'phone2' => 'nullable|max:15',
            'address' => 'required|string|max:255',
            'tin' => 'required|string|max:20|unique:owners',
            'nid' => 'required|string|max:20|unique:owners',
            'passport_picture' => 'nullable|mimes:webp,jpeg,jpg,png',
        ];
    }

    public function save()
    {
        $this->validate();

        $pictureName = null;
        if ($this->passport_picture) {
            $pictureName = Str::random(8) . '-' . Carbon::now()->timestamp . '.' . $this->passport_picture->extension();
            $this->passport_picture->storeAs('owners', $pictureName);
        }

        try {
            $owner = Owner::make([
                'title' => $this->title,
                'name' => $this->name,
                'email' => $this->email,
                'phone1' => $this->phone1,
                'phone2' => $this->phone2,
                'address' => $this->address,
                'tin' => $this->tin,
                'nid' => $this->nid,
                'passport_picture' => $pictureName,
            ]);

            $owner->save();

            // Sent Invite Mail
            Mail::to($owner->email)->send(new OwnerInvite($owner));


            session()->flash('success', 'Owners details was successfully saved!');
            return redirect()->route('owners.index');
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
        return view('livewire.staffadmin.owner.create');
    }
}