<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kota extends Model
{
    use HasFactory;

    public function provinsi()
    {
        return $this->belongsTo(provinsi::class,'provinsi_id','id');
    }
}
