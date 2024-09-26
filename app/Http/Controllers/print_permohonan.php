<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\user;
use App\Models\tblPengajuan;
use Illuminate\Http\Request;

class print_permohonan extends Controller
{   public $nama;
    public function print($url)
    {   
        $user = tblPengajuan::find($url); 
        $nama = $user->user->name;
        $pdf = PDF::loadview('pdf_view',['payment'=>$user],['nama'=>$nama]);
    	return $pdf->stream();
    }
}
