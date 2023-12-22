<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }

    public function progres(){
        return $this->hasMany(Progres::class);
    }
}
