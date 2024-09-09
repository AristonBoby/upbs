<?php

namespace App\Livewire\StatusLayanan;

use App\Models\tblPengajuan;
use Livewire\Component;
use Livewire\WithPagination;

class DataPengajuan extends Component
{   protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public $pencarian ='';
    public $idModal;

    public function render()
    {   
        $data = tblPengajuan::paginate(10);
     
        $data = tblPengajuan::where('status',1)->whereHas('user',function($query){
                $query->where('name','LIKE','%'.$this->pencarian.'%')->orWhere('alamat','LIKE','%'.$this->pencarian.'%');
            })->paginate(10);
    

        return view('livewire.status-layanan.data-pengajuan',['datapengajuan'=>$data]);
    }

    public function updatingPencarian()
    {  
        $this->resetPage();
    }


    public function findId($id)
    {
        dd($id);
        $this->idModal = $id;
    }
}
