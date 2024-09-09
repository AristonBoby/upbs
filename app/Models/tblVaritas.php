<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tblVaritas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'varitas',
        'harga',
        'tblkat_varitas_id',
        'status'
    ];
    protected $dates = ['deleted_at'];
    
    public function tblkat ()
    {
        return $this->belongsTo('App\Models\tblkatVaritas','tblkat_varitas_id','id');
    }

}
