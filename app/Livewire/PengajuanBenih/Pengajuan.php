<?php

namespace App\Livewire\PengajuanBenih;

use App\Models\kota;
use App\Models\User;
use Livewire\Component;
use App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\tblVaritas;
use App\Models\itemVaritas;
use Illuminate\Support\Str;
use App\Models\tblPengajuan;
use App\Models\jenispembayaran;
use App\Http\Controllers\varitas;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public $totalBayar;
    
    public function mount()
    {
        $this->varitas=[0];
        $this->i = 0 ;
        $this->fill([
            'idvaritas'=>collect([['varitas'=>'','jumlah'=>'']])
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
        $pembayaran = jenispembayaran::all();

        return view('livewire.pengajuan-benih.pengajuan',['provinsi'=>$provinsi,'kota'=>$kota,'kecamatan'=>$kecamatan,'kelurahan'=>$kelurahan,'pembayaran'=>$pembayaran]);
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
        $this->idvaritas->push(['varitas'=>'','jumlah'=>'']);
    }

    public function remove($id)
    {
        unset($this->varitas[$id]);
        unset($this->jumlah[$id]);
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
            $id = Str::uuid();
            $query = tblPengajuan::create([
                'id'                    => $id,
                'user_id'               => Auth::User()->id,
                'kelurahan_id'          => $this->varKelurahan,
                'status'                => 1,
                'jenispembayaran_id'    => $this->varPembayaran,
                'tglPengambilan'        => $this->varTglpengambilan,
            ]);
            if($query)
            {
                foreach($this->idvaritas as $data)
                {
                    $querytotal = tblVaritas::where('id',$data['varitas'])->first();
                    $query = itemVaritas::create([
                      
                        'tbl_pengajuan_id' => $id,
                        'tbl_varitas_id'   => $data['varitas'],
                        'jumlah'           => $data['jumlah'],
                        'total'            => $data['jumlah'] * $querytotal->harga,
                        'status'           => 'ok',
                    ]);          
                }
            
                $queryHarga = itemVaritas::where('tbl_pengajuan_id',$id)->get();

                foreach($queryHarga as $data)
                {
                    $this->totalBayar += $data->total;
                }
                
                $data = tblPengajuan::where('id',$id)->update([
                    'harga' => $this->totalBayar,
                ]);

                if($data)
                {
                    $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);
                    $this->resetform();
                }
            }
    }

    public function resetForm()
    {
        $this->varTglpengambilan = '';
        $this->varKelurahan='';
        $this->varKota = '';
        $this->varProvinsi = '';
        $this->varKecamatan='';
        $this->varPembayaran='';
        $this->varitas = [];
        $this->fill([
            'idvaritas'=>collect([['varitas'=>'','jumlah'=>'','lokasiTanam'=>'']])
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
