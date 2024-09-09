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
        $query = tblPengajuan::where('id',$this->idModal)->first();
        $data = tblPengajuan::where('status',1)->withWhereHas('user',function($query){
            $query->where('name','LIKE','%'.$this->pencarian.'%')->orWhere('alamat','LIKE','%'.$this->pencarian.'%')->select('name');
        })->paginate(10);
    

        return view('livewire.status-layanan.data-pengajuan',['datapengajuan'=>$data,'detaiId'=>$query]);
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
