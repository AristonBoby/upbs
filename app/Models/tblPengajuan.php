<?php

namespace App\Models;

use App\Models\User;
use App\Models\kelurahan;
use App\Models\itemVaritas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class tblPengajuan extends Model
{   use SoftDeletes;
    use HasFactory;
    use HasUuids;
    protected  $table = 'tbl_pengajuans';
    protected $fillable = [
        'id',
        'user_id',
        'kelurahan_id',
        'status',
        'jenispembayaran_id',
        'tglPengambilan',
        'harga'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(kelurahan::class,'kelurahan_id','id');
    }
    
    public function itemvaritas()
    {
       return $this->hasMany(itemVaritas::class, 'tbl_pengajuan_id','id');
    }
    
}
