<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'T_PROVINSI';
    protected $fillable = [
        'id','kode','name','active'
    ];
}
