<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbilAntrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    public $timestamps = false;

    protected $fillable = [
        "idpoli",
        "namapoli",
        "tanggal",
    ];
}
