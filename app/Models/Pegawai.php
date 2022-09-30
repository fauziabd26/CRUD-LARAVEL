<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 't_pegawai';
    protected $fillable = [
        'id',
        'name',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'kel_id',
        'kec_id',
        'prov_id'
    ];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kec_id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class, 'kel_id');
    }
    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'prov_id');
    }
}
