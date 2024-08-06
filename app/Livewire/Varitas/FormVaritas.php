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
    public $varStatus=1;

    protected $rules = [
        'varVaritas'    => 'required',
        'varHarga'      => 'required|numeric',
        'varKategori'   => 'required',
        'varStatus'     => 'required',

    ];

    protected $messages = [
        'varVaritas.required'       => 'Data Varitas wajib diisi !!!',
        'varHarga.required'         => 'Data Harga wajib diisi !!!',
        'varHarga.numeric'          => 'Data Harga wajib angka !!!',
        'varKategori.required'      => 'Data Kategori wajib diisi !!!',
        'varStatus.required'        => 'Data Status wajib diisi !!!',
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
            'status'            =>  $this->varStatus
        ]);

        if($query)
        {
            $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }
}
