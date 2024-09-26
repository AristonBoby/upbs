<?php

namespace App\Livewire\StatusLayanan;

use App\Models\tblPengajuan;
use Livewire\Component;
use Livewire\WithPagination;
//use Barryvdh\DomPDF\PDF;
use PDF;

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
        $this->cekHarga();
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
        if($query)
        {
            $this->dispatch('alert',text:'Konfirmasi Telah dibatalkan  !!!',icon:'success',title:'Berhasil',timer:2000);
        }
    }


    public function cekHarga()
    {
        $totalItem = 0;
        $query = tblPengajuan::where('id',$this->idModal)->first();
        $total = $query->harga; 
        foreach($query->itemvaritas as $data)
        {
            $totalItem += $data->total;
        }


        if(($query->whereNull('harga')) || $query->harga === 0 )
        {
            $query->update([
                'harga' => $totalItem,
            ]);
        }
    }
    public function print()
    {   $user = tblPengajuan::where('id',$this->idModal)->first(); 
        $id ='fffff';
        $payment = [
            'id' => $id,
            'users'=>$user,
            'name' => 'Ajith',
            'amount' => 5000,
            'date' => date('Y-m-d'),
            'description' => 'Payment for services rendered'
        ];
        // Generate PDF
        $pdf = PDF::loadView('pdf_view', ['payment'=>$payment])->setPaper(array(0,0,609.4488,935.433), 'portrait');
        // Download PDF
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'name.pdf');
    }

    
}
