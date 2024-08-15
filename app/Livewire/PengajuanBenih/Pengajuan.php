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
use User;

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

    public $varitas;
    public $i;
    public $jumlah;
    public $harga;


    public function mount()
    {
        $this->varitas=[];
        $this->jumlah=[];
        $this->harga=[];
        $this->i = 1 ;
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
        $this->valNama  =   Auth::User()->name;
        $this->valAlamat  =   Auth::User()->alamat;
        $this->valnoTlpn  =   Auth::User()->noTlpn;
        $this->valPekerjaan  =   Auth::User()->pekerjaan;
    }

    public function add($i)
    {
        $this->i = $i + 1;
        array_push($this->varitas,$this->i);
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
        $this->validate();
        //dd($this->jumlah);
        $aray = array_values($this->jumlah);
        dd($aray);


    }
}
