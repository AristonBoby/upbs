<?php

namespace App\Models;

use App\Models\User;
use App\Models\itemVaritas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblPengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'kelurahan_id',
        'status',
        'jenispembayaran_id',
        'tglPengambilan',
        'harga'
    ];

    public function relasiitemvaritas()
    {
        return $this->hasMany(itemVaritas::class,'tbl_pengajuan_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
