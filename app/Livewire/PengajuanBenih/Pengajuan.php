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
    public $idVaritas;

    // Modal Variable //
    public $modalVaritas;
    public $modalJumlah;
    public $modalHarga;
    public $total;

    public function mount()
    {   $this->idVaritas =[0];
        $this->varitas=[0];
        $this->jumlah=[];
        $this->harga=[];
        $this->total=[];
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
        $q = count($this->varitas);
        if($q < 3){
            $this->varitas[] +=1;
        }
       
    }

    public function remove($id)
    {
        unset($this->varitas[$id]);
        unset($this->jumlah[$id]);
        unset($this->harga[$id]);
        unset($this->idVaritas[$id]);


    }

    protected $rules = [
        'jumlah'        => 'array|required',
        // 'jumlah.1'      => 'required',
        // 'jumlah.2'      => 'required',
        'harga.0'       => 'required',
        'harga.1'       => 'required',
        'harga.2'       => 'required',
        'total.0'       => 'required',
        'total.1'       => 'required',
        'total.2'       => 'required',
        'idVaritas.0'   => 'required',
        'idVaritas.1'   => 'required',
        'idVaritas.2'   => 'required',
    ];

    public function simpan()
    {
        $this->validate();
        dd('dd');
    }

    public function jenisVaritas($no)
    {
         $query = tblVaritas::where('id',$this->idVaritas[$no])->first();            
    }

    public function varitasView($id)
    {
        $this->i = $id;
    }

    public function simpanVaritas ()
    {
        $this->idVaritas[$this->i]  = $this->modalVaritas;
        $this->jumlah[$this->i]     = $this->modalJumlah;
        $query = tblVaritas::find($this->modalVaritas)->first();
        $this->harga[$this->i]      = $query->harga;
        $this->total[$this->i]      = $query->harga * $this->modalJumlah;
       
        
    }
}
