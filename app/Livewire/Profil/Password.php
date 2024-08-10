<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $valpassBaru;
    public $valrepassBaru;

    public function render()
    {
        return view('livewire.profil.password');
    }

    protected $rules = [

        'valpassBaru'      => 'required|same:valrepassBaru|min:6',
        'valrepassBaru'    => 'required|min:6',
    ];

    protected $messages = [
        'valpassBaru.min'           => 'Minimal 6 Karakter',
        'valpassBaru.same'          => 'Password yang anda masukan tidak sama',
        'valpassBaru.required'      => 'Password Baru wajib diisi',
        'valrepassBaru.min'         => 'Minimal 6 Karakter',
        'valrepassBaru.required'    => 'Ulangi password baru wajib diisi'

    ];

    public function passwordUpdate()
    {
        $this->validate();
        $id = Auth::user()->id;
            $query = User::find($id)->update([
                'password' => Hash::make($this->valpassBaru),
            ]);
            if($query)
            {
                $this->logout();
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
