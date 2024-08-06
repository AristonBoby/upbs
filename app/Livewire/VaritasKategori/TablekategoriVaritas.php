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

    public function render()
    {
        $query = tblkatVaritas::where('kategori','like',"%{$this->pencarian}%")->orderBy('created_at','desc')->paginate(10);
        return view('livewire.varitas-kategori.tablekategori-varitas',['query'=>$query]);
    }

    public function updatingPencarian()
    {
        $this->resetPage();
    }
    public function refesh()
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

}
