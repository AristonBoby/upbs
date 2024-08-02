<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblVaritas extends Model
{
    use HasFactory;

    protected $fillable = [
        'varitas',
        'harga',
        'tblkat_varitas_id',
    ];

    public function tblkat ()
    {
        return $this->belongsTo('App\Models\tblkatVaritas','tblkat_varitas_id','id');
    }

}
