<?php

namespace App\Livewire\PengajuanBenih;

use App\Http\Controllers\varitas;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use App\Models\provinsi;
use App\Models\tblVaritas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pengajuan extends Component
{
    public $varprovinsi;
    public $varKota;
    public $varKecamatan;
    public $varKelurahan;
    public $valNama;
    public $valAlamat;
    public $valnoTlpn;
    public $valPekerjaan;

    public $varitas=0;
    public $i;
    public $jumlah;
    public $harga;
    public $idvaritas;


    public function mount()
    {   $this->idVaritas =[0];
        $this->varitas=[0];
        $this->jumlah=[];
        $this->harga=[];
        $this->i = 0 ;
    }

    public function render()
    {
        $this->dataUser();
        $provinsi   = provinsi::all();
        $kota       = kota::where('provinsi_id',$this->varprovinsi)->get();
        $kecamatan  = kecamatan::where('kota_id',$this->varKota)->get();
        $kelurahan  = kelurahan::where('kecamatan_id',$this->varKecamatan)->get();
        $varitas    = tblVaritas::all();
        return view('livewire.pengajuan-benih.pengajuan',['provinsi'=>$provinsi,'kota'=>$kota,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'jenis'=>$varitas]);
    }

    public function dataUser()
    {
        $this->valNama      =   Auth::User()->name;
        $this->valAlamat    =   Auth::User()->alamat;
        $this->valnoTlpn    =   Auth::User()->noTlpn;
        $this->valPekerjaan =   Auth::User()->pekerjaan;
    }

    public function add()
    {
        $this->varitas[] +=1;
    }

    public function remove($id)
    {
        unset($this->varitas[$id]);
        unset($this->jumlah[$id]);
        unset($this->harga[$id]);

    }

    protected $rules = [
        'jumlah.0' => 'array|required',
    ];

    public function simpan()
    {
        dd($this->idvaritas);
        // $this->validate();
        // $aray = array_values($this->jumlah);
        // dd($aray);
    }

    public function jenisVaritas($no)
    {
         $query = tblVaritas::where('id',$this->idvaritas[$no])->first();
        dd($this->idvaritas[$no]);
            
    }

    public function updatingIdvaritas()
    {
        dd('ddd');
    }

    public function varitasView($id)
    {
        dd($id);
    }
    
}
