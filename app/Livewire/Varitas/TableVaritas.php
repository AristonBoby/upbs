<?php

namespace App\Livewire\Varitas;

use App\Models\tblkatVaritas;
use App\Models\tblVaritas;
use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire;

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
    public $statusVaritas=1;

    public function render()
    {
        $kategori   = tblkatVaritas::where('status',1)->get();
        $query      = tblVaritas::where('varitas','Like',"%{$this->search}%")->orderBy('created_at','desc')->paginate('10');
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
            $this->dispatch('alertEdit',text:'Data Berhasi diperbarui !!!',icon:'success',title:'Berhasil',timer:2000);
        } else {
            $this->dispatch('alertEdit',text:'Data gagal diperbarui !!!',icon:'danger',title:'Gagal',timer:2000);
        }
    }

    public function hapus()
    {
        $query  =   tblVaritas::find($this->id)->delete();
        if($query)
        {
            $this->dispatch('alertDelete',text:'Data Berhasi di Hapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

    public function restoreVaritas($id)
    {
        $user = tblVaritas::withTrashed()->find($id);
        $user->restore();

    }
}
