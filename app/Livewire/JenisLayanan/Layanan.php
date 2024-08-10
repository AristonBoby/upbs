<?php

namespace App\Livewire\JenisLayanan;

use App\Models\tblVaritas;
use Livewire\Component;

class Layanan extends Component
{
    public function render()
    {
        $query = tblVaritas::where('status','1')->get();
        return view('livewire.jenis-layanan.layanan',['items',$query]);
    }
}
