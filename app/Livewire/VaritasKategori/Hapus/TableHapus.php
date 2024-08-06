<?php

namespace App\Livewire\VaritasKategori\Hapus;

use Livewire\Component;
use App\Models\tblkatVaritas;
use Livewire\WithPagination;

class TableHapus extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id;
    public $pencarian;

    public function updatingPencarian()
    {
        $this->resetPage();
    }

    public function render()
    {   $query = tblkatVaritas::where('kategori','like',"%{$this->pencarian}%")->onlyTrashed()->paginate(10);
        return view('livewire.varitas-kategori.hapus.table-hapus',['query'=>$query]);
    }

    public function refreshTable()
    {
        $this->render();
    }
    public function idRestore($id)
    {
        $this->id = $id;
    }

    public function restoreVaritas()
    {
        $query = tblkatVaritas::where('id',$this->id)->onlyTrashed()->first();
        $query->restore();
        if($query)
        {
            $this->dispatch('alertVaritas',text:'Data Berhasil diupdate !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }
}
