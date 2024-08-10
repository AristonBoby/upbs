<?php

namespace App\Livewire\JenisLayanan;

use App\Models\tblVaritas;
use Livewire\Component;

class JenisLayanan extends Component
{
    public function render()
    {
        $query = tblVaritas::where('status','1')->get();
        return view('livewire.jenis-layanan.jenis-layanan',['query'=>$query]);
    }
}
