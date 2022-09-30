<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 't_kecamatan';
    protected $fillable = [
        'id','kode','name','active'
    ];
}
