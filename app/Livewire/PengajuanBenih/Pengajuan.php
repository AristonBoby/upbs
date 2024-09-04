<?php

namespace App\Livewire\PengajuanBenih;

use App\Http\Controllers\varitas;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use App\Models\provinsi;
use App\Models\tblPengajuan;
use App\Models\tblVaritas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;

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
    public $jenis;

    // Modal Variable //
    public $modalVaritas;
    public $modalJumlah;
    public $modalHarga;
    public $total;

    ///

    public $varTglpengambilan;
    public $varPembayaran;
    public $varProvinsi;

    public function mount()
    {   
        $this->varitas=[0];
        $this->i = 0 ;
        $this->fill([
            'idvaritas'=>collect([['varitas'=>'','jumlah'=>'','total'=>'','harga'=>'']])
        ]);
        $this->jenis    = tblVaritas::all();
    }

    public function render()
    {
        $this->dataUser();
        $provinsi   = provinsi::all();
        $kota       = kota::where('provinsi_id',$this->varprovinsi)->get();
        $kecamatan  = kecamatan::where('kota_id',$this->varKota)->get();
        $kelurahan  = kelurahan::where('kecamatan_id',$this->varKecamatan)->get();
        
        return view('livewire.pengajuan-benih.pengajuan',['provinsi'=>$provinsi,'kota'=>$kota,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan]);
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
        $this->idvaritas->push(['varitas'=>'','jumlah'=>'','total'=>'','harga'=>'']);
    }   

    public function remove($id)
    {
        unset($this->varitas[$id]);
        unset($this->jumlah[$id]);
        unset($this->harga[$id]);
        unset($this->idvaritas[$id]);
    }

    // public function updatingIdvaritas($value, $key){
    //     $query = tblVaritas::where('id',$value)->first();
    //     $q = explode('.', $key);    
    //     $keys = $q[0];
    //     $this->idvaritas[$keys] = array('harga'=>$query->harga);
    // }
    protected $messages = [
        'varTglpengambilan.required'    =>  'Data Tanggal Pengambilan Wajib diisi !!! ',
        'varPembayaran.required'        =>  'Data Jenis Wajib diisi !!! ',
        'varProvinsi.required'          =>  'Data Provinsi Wajib diisi !!!',
        'varKota.required'              =>  'Data Kota Wajib diisi !!!',
        'varKecamatan.required'         =>  'Data Kecamatan Waib diisi !!!',
        'varKelurahan.required'         =>  'Data Kelurahan Wajib diisi !!!',
    ];

    public function simpan()
    {   
            $this->validate([ 
                'idvaritas.*.jumlah'        =>  'required',
                'idvaritas.*.varitas'       =>  'required',
                'varTglpengambilan'         =>  'required',
                'varPembayaran'             =>  'required',
                'varProvinsi'               =>  'required',
                'varKota'                   =>  'required',
                'varKecamatan'              =>  'required', 
                'varKelurahan'              =>  'required',
            ]);
            
            $query = tblPengajuan::create([

            ]);
    }
    public function jenisVaritas($no)
    {
         $query = tblVaritas::where('id',$this->idvaritas[$no])->first();            
    }

    public function varitasView($id)
    {
        $this->i = $id;
    }

    public function simpanVaritas ()
    {
        $this->idvaritas[$this->i]  = $this->modalVaritas;
        $this->jumlah[$this->i]     = $this->modalJumlah;
        $query = tblVaritas::find($this->modalVaritas)->first();
        $this->harga[$this->i]      = $query->harga;
        $this->total[$this->i]      = $query->harga * $this->modalJumlah;
       
        
    }
}
