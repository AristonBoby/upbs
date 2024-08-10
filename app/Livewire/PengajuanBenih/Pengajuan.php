<?php

namespace App\Livewire\PengajuanBenih;

use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use App\Models\provinsi;
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
        $this->valNama  =   Auth::User()->name;
        $this->valAlamat  =   Auth::User()->alamat;
        $this->valnoTlpn  =   Auth::User()->noTlpn;
        $this->valPekerjaan  =   Auth::User()->pekerjaan;
    }
}
