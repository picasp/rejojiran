<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusans';
    public $timestamps = false;
    protected $primaryKey = 'id_jurusan';
    protected $fillable = [
        'id_bidang',
        'id_jurusan',
        'nama_jurusan'
    ];
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'id');
    }
}
