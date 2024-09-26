<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\user;
use App\Models\tblPengajuan;
use Illuminate\Http\Request;

class print_permohonan extends Controller
{   
    public function print($url)
    {   
        $user = tblPengajuan::find($url); 
        $tanggal=Carbon::parse($user->tglPengambilan)->format('d F Y') ;
        $tgl=Carbon::parse($user->tglPengambilan)->isoFormat('dddd') ;
        $pdf = PDF::loadview('pdf_view',['payment'=>$user,'tanggal'=>$tanggal, 'tgl'=>$tgl]);
    	return $pdf->stream();
    }
}
