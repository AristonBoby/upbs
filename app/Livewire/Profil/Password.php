<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $passLama;
    public $passBaru;
    public $repassBaru;

    public function render()
    {
        return view('livewire.profil.password');
    }

    public $rules = [
        'passLama'      => 'required',
        'passBaru'      => 'required',
        'repassBaru'    => 'required|same:passBaru',
    ];

    public function passwordUpdate()
    {
        $this->validate();
        $id = Auth::user()->id;
        $query = User::find($id)->update([
            'password' => Hash::make($this->passBaru),

        ]);
    }
}
