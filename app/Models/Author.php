<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    public $timestamps = false;
    protected $fillable = [
        'article_id',
        'first_name',
        'middle_name',
        'last_name',
    ];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
