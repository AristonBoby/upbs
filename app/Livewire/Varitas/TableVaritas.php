<?php

namespace App\Livewire\Varitas;

use App\Models\tblkatVaritas;
use App\Models\tblVaritas;
use Livewire\Component;
use Livewire\WithPagination;

class TableVaritas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $varitasKategori;
    public $id;
    public $varitas;
    public $harga;
    public $kategori;
    public $status=0;
    public function render()
    {
        $kategori = tblkatVaritas::all();
        $query = tblVaritas::where('varitas','Like',"%{$this->search}%")->paginate('10');
        return view('livewire.varitas.table-varitas',['query'=>$query, 'kat'=>$kategori]);
    }

    public function refresh()
    {
        $this->render();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editModal($id)
    {
        $this->varitasKategori = tblVaritas::where('id',$id)->first();
        $this->id = $this->varitasKategori->varitas;
        $this->kategori = $this->varitasKategori->tblkat_varitas_id;
        $this->varitas = $this->varitasKategori->varitas;
        $this->harga = $this->varitasKategori->harga;
        dd($this->status);
    }
}
