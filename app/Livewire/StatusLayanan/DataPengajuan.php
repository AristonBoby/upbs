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
        $modal = tblPengajuan::where('id',$this->idModal)->get();
        $data = tblPengajuan::whereHas('user',function($query){
                $query->where('name','LIKE','%'.$this->pencarian.'%')->orWhere('alamat','LIKE','%'.$this->pencarian.'%');
            })->paginate(10);
        return view('livewire.status-layanan.data-pengajuan',['datapengajuan'=>$data,'dataModal'=>$modal]);
    }

    public function updatingPencarian()
    {  
        $this->resetPage();
    }


    public function findId($id)
    {
        $this->idModal = $id; 
    }

    public function hapus()
    {
        $query = tblPengajuan::find($this->idModal)->forcedelete();
        if($query)
        {
            $this->dispatch('alert',text:'Data Berhasi dihapus !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }

    public function konfirmasiPengajuan()
    {

        $query = tblPengajuan::where('id',$this->idModal)->first();
        $query->update([
            'status'=>'0',
        ]);

        if($query)
        {
            $this->dispatch('alert',text:'Data Telah Terkonfirmasi  !!!',icon:'success',title:'Berhasil',timer:2000);
        }
        // $query = tblPengajuan::where('id',$this->idModal)->first();
        // $query->status = '0';

        // if($query)
        // {   $this->idModal = '';
        //     $this->dispatch('alert',text:'Data Telah Terkonfirmasi  !!!',icon:'success',title:'Berhasil',timer:2000);
        // }

    }

    public function btlKonfirmasi()
    {   
        $query = tblPengajuan::where('id',$this->idModal)->first();
        $query->update([
            'status'=>'1',
        ]);
    }

    
}
