<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    public $timestamps = false;

    protected $fillable = [
        "idpoli",
        "namapoli",
        "nik",
        "namapasien",
        "tipepasien",
        "nobpjs",
        "alamat",
        "tanggal",
        "noantrian",
        "status"
    ];
}
