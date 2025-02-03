<?php

namespace App\Livewire\UserResources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    Use WithFileUploads;

    public $image;

    public function save()
    {
        if($this->image == null) return;

        $imageUrl = $this->image->store('users', 'public');

        $user = Auth::user();

        // Delete the old image file if it exists
        if ($user->profile) {
            Storage::disk('public')->delete($user->profile);
        }

        $user->profile = $imageUrl;
        $user->save();

        $this->dispatch('reload-page');
    }

    public function render()
    {
        return view('livewire.user-resources.user-profile');
    }
}
