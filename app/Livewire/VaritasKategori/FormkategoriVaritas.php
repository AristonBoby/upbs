<?php

namespace App\Livewire\VaritasKategori;

use App\Models\tblkatVaritas;
use Livewire\Component;

class FormkategoriVaritas extends Component
{
    public $varKategori;
    public $varStatus=true;

    public function render()
    {
        return view('livewire.varitas-kategori.formkategori-varitas');
    }

    protected $rules = [
        'varKategori'   => 'required|max:50',
        'varStatus'     => 'required',
    ];


    protected $messages = [
        'varKategori.required'  => 'Data kategori wajib diisi !!!',
        'varKategori.max'       => 'Data kategori Maksimal 50 Karakter !!!',
    ];

    public function simpan()
    {
        $this->validate();
        $query = tblkatVaritas::create([
            'kategori'  =>  $this->varKategori,
            'status'    =>  $this->varStatus,
        ]);

        if ($query) {
            $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
            $this->varStatus = '';
            $this->varStatus = true;
        } else {
            $this->dispatch('alert',text:'Data Gagal Disimpan !!!',icon:'danger',title:'Gagal',timer:2000);
        }

    }
}
