<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidangs';
    public $timestamps = false;
    protected $primaryKey = 'id_bidang';
    protected $fillable = [
        'nama_bidang'
    ];

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class,  'id_bidang');
    }
}
