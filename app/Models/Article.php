<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'article_title',
        'abstract',
        'file',
        'id_user',
        'id_jurusan'
    ];
    public function author()
    {
        return $this->hasMany(Author::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
