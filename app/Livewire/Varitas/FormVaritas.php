<?php

namespace App\Livewire\Varitas;

use App\Models\tblkatVaritas;
use App\Models\tblVaritas;
use Livewire\Component;

class FormVaritas extends Component
{
    public $varVaritas;
    public $varHarga;
    public $varKategori;
    public $varStatus;

    protected $rules = [
        'varVaritas'    => 'required',
        'varHarga'      => 'required|numeric',
        'varKategori'   => 'required',
        'varStatus'     => 'required',

    ];
    public function render()
    {
        $kategori = tblkatVaritas::all();
        return view('livewire.varitas.form-varitas',['kategori'=>$kategori]);
    }

    public function create()
    {   $this->validate();
        $query = tblVaritas::create([
            'varitas'           =>  $this->varVaritas,
            'harga'             =>  $this->varHarga,
            'tblkat_varitas_id' =>  $this->varKategori,
        ]);


    }
}
