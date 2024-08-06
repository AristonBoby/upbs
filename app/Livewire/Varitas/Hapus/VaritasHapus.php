<?php

namespace App\Livewire\Varitas\Hapus;

use App\Models\tblVaritas;
use Livewire\Component;

class VaritasHapus extends Component
{
    public $pencarian;

    public function render()
    {
        $query      = tblVaritas::onlyTrashed()->where('varitas','LIKE',"%{$this->pencarian}%")->paginate(10);
        return view('livewire.varitas.hapus.varitas-hapus',['query'=>$query]);
    }

    public function refresh()
    {
        $this->render();
    }


    public function restore($id)
    {
        $query = tblVaritas::withTrashed()->find($id)->restore();

        if($query)
        {
            $this->dispatch('alertEdit',text:'Data Berhasi diperbarui !!!',icon:'success',title:'Berhasil',timer:2000);
        }

    }
}
