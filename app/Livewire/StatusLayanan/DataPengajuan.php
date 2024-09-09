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
        $query = tblPengajuan::where('user.name',$this->idModal)->first();
        $data = tblPengajuan::select('id')->where('status',1)->whereHas('user',function($query){
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
