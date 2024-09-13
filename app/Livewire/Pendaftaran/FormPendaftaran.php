<?php

namespace App\Livewire\Pendaftaran;
use App\Models\role;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\userPendaftaran;
use Illuminate\Support\Facades\Hash;

class FormPendaftaran extends Component
{
    public $varNama;
    public $varEmail;
    public $varAlamat;
    public $varHp;
    public $varPekerjaan;
    public $varPassword;
    public $varrePassword;


    protected $rules = [
        'varNama'       =>  'required|min:3',
        'varEmail'      =>  'required|email|unique:users,email',
        'varAlamat'     =>  'required',
        'varHp'         =>  'required|numeric',
        'varPassword'   =>  'required',
        'varPekerjaan'  =>  'required',
        'varrePassword' =>  'required|same:varPassword',
    ];

    protected $messages = [
        'varNama.required'          =>  'Nama wajib diisi !!!',
        'varNama.min'               =>  'Nama Min 3 karakter !!!',
        'varEmail.required'         =>  'Email wajib diisi !!!',
        'varEmail.unique'           =>  'Email telah terdaftar !!!',
        'varAlamat.required'        =>  'Alamat wajib diisi !!!',
        'varHp.required'            =>  'Nomor Telpon / Hp wajib disi !!!',
        'varPassword.required'      =>  'Password wajib diisi !!!',
        'varrePassword.required'    =>  'Re-Password wajib diisi !!!',
        'varrePassword.same'        =>  'Password tidak sama !!!',
        'varPekerjaan.required'     =>  'Pekerjaan wajib dipilih !!!'

    ];
    public function render()
    {
        return view('livewire.pendaftaran.form-pendaftaran');
    }

    public function create()
    {
        $this->validate();
        $role = role::where('idRole','01')->first();
        if($role)
        {
            $query = userPendaftaran::create([
                'name'      =>  $this->varNama,
                'email'     =>  $this->varEmail,
                'alamat'    =>  $this->varAlamat,
                'password'  =>  Hash::make($this->varrePassword),
                'noTlpn'    =>  $this->varHp,
                'pekerjaan' =>  $this->varPekerjaan,
                'status'    =>  1,
                'role_id'   =>  $role->idRole,
            ]);


                $this->dispatch('alert',text:'Data Berhasil Disimpan !!!',icon:'success',title:'Berhasil',timer:2000);

        }
        else
        {
            $this->dispatch('alert',text:'Tidak dapat mengambil data role !!!',icon:'error',title:'Database Error',timer:2000);
        }


    }
}
