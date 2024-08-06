<?php

namespace App\Livewire\VaritasKategori;

use App\Models\tblkatVaritas;
use Livewire\Component;
use Livewire\WithPagination;

class TablekategoriVaritas extends Component
{   use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pencarian;
    public $id;
    public $valKategori='';
    public $valStatus=1;

    public function render()
    {
        $query = tblkatVaritas::where('kategori','like',"%{$this->pencarian}%")->orderBy('created_at','desc')->paginate(10);
        return view('livewire.varitas-kategori.tablekategori-varitas',['query'=>$query]);
    }

    public function updatingPencarian()
    {
        $this->resetPage();
    }
    public function refeshTable()
    {
        $this->render();
    }

    public function hapusId($id)
    {
        $this->id = $id;
    }

    public function hapus()
    {
        $query = tblkatVaritas::find($this->id)->delete();

        if($query)
        {
            $this->dispatch('alertVaritas',text:'Data Berhasil dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

    public function editId($id)
    {
        $query = tblkatVaritas::where('id',$id)->first();
        if($query)
        {
            $this->valKategori  = $query->kategori;
            $this->valStatus    = $query->status;
            $this->id           = $query->id;
        }
    }

    public $rules = [
        'valKategori'   => 'required',
        'valStatus'     => 'required',
    ];

    public $messages = [
        'valKategori.required'  => 'Data Kategori wajib diisi !!!'
    ];

    public function updateKategori()
    {   $this->validate();
        $query = tblkatVaritas::where('id',$this->id)->first();
        $query->update([
            'kategori' => $this->valKategori,
            'status' => $this->valStatus,
        ]);

        if ($query)
        {
            $this->dispatch('alertVaritas',text:'Data Berhasil diupdate !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

}
