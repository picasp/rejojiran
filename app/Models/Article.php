<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_title',
        'abstract',
        'file',
    ];
    public function author()
    {
        return $this->hasMany(Author::class);
    }
}
