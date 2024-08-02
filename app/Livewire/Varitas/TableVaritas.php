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
    public $status=1;

    public function render()
    {
        $kategori = tblkatVaritas::all();
        $query = tblVaritas::where('varitas','Like',"%{$this->search}%")->orderBy('created_at','desc')->paginate('10');
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
        $this->varitasKategori  = tblVaritas::where('id',$id)->first();
        $this->id               = $this->varitasKategori->id;
        $this->kategori         = $this->varitasKategori->tblkat_varitas_id;
        $this->varitas          = $this->varitasKategori->varitas;
        $this->harga            = $this->varitasKategori->harga;
        $this->status           = $this->varitasKategori->status;
    }

    public function update()
    {
        $query = tblVaritas::where('id',$this->id)->first()->update([
            'varitas'   =>  $this->varitas,
            'harga'     =>  $this->harga,
            'status'    =>  $this->status,
            'kategori'  =>  $this->kategori,
        ]);

        if ($query) {
            $this->dispatch('alert',text:'Data Berhasil diperbarui !!!',icon:'success',title:'Berhasil',timer:2000);
        } else {

        }


    }
}
