<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 't_kelurahan';
    protected $fillable = [
        'id','kode','name','active','kec_id'
    ];
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kec_id');
    }
}
