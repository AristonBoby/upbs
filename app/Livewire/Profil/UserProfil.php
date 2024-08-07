<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfil extends Component
{
    public $name;
    public $email;
    public $pekerjaan;
    public $noTlpn;
    public $alamat;
    public $id;

    public function render()
    {
        $query = User::where('id',Auth::user()->id)->first();
        $this->name         = $query->name;
        $this->pekerjaan    = $query->pekerjaan;
        $this->noTlpn       = $query->noTlpn;
        $this->alamat       = $query->alamat;
        return view('livewire.profil.user-profil');
    }

    public $rules = [
        'name'      =>  'required',
        'pekerjaan' =>  'required',
        'noTlpn'    =>  'required',
        'alamat'    =>  'required',
    ];

    public function update()
    {
        $this->validate();
        $query = User::where('id',Auth::user()->id)->first();
        if($query)
        {
            $query->update([
                'name'          => $this->name,
                'pekerjaan'     => $this->pekerjaan,
                'noTlpn'        => $this->noTlpn,
                'alamat'        => $this->alamat,
            ]);
        }
        if($query)
        {
            $this->dispatch('alert',text:'Data Berhasil diperbarui !!!',icon:'success',title:'Berhasil',timer:2000);
        }
        else
        {
            $this->dispatch('alert',text:'Data Gagal diperbarui !!!',icon:'danger',title:'Berhasil',timer:2000);
        }
    }
}
