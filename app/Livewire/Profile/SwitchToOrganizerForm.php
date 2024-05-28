<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SwitchToOrganizerForm extends Component
{
    use WithFileUploads;

    public $organization_name;
    public $organization_logo;
    public $existing_logo;

    public function mount()
    {
        $user = Auth::user();
        $this->organization_name = $user->organization_name;
        $this->existing_logo = $user->organization_logo;
    }

    public function switchToOrganizer()
    {
        $user = Auth::user();
        $this->validate([
            'organization_name' => 'required|string|max:255',
            'organization_logo' => 'nullable|image|max:1024', // Optional logo upload
        ]);

        if ($this->organization_logo) {
            $logoPath = $this->organization_logo->store('logos', 'public');
            $user->organization_logo = $logoPath;
        }

        $user->organization_name = $this->organization_name;
        $user->role = 'event_organizer';
        $user->save();

        session()->flash('message', 'Profile updated successfully!');
    }


    public function render()
    {
        return view('livewire.profile.switch-to-organizer-form')->layout('layouts.app');;
    }
}
