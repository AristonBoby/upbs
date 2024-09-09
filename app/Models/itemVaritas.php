<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemVaritas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tbl_pengajuan_id',
        'tbl_varitas_id',
        'jumlah',
        'total',
        'status',
    ];

    public function relasitblvaritas ()
    {
        return $this->belongsTo(tblVaritas::class,'tbl_varitas_id','id');
    }
}
